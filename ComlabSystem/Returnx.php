<!DOCTYPE html>
<?php
include("itemconnection.php");

$resultsPerPage = 5;
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$startFrom = ($currentPage - 1) * $resultsPerPage;

// Check if search parameter is set
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = mysqli_real_escape_string($con, $_GET['search']);
    $sql = "SELECT * FROM items WHERE Availability = 'NO' AND (ItemName LIKE '%$searchTerm%' OR Classification LIKE '%$searchTerm%' OR UserID LIKE '%$searchTerm%' OR NameOfUser LIKE '%$searchTerm%');";
    $result = mysqli_query($con, $sql);
    $resultCheck = mysqli_num_rows($result);
} else {
    // If no search term, execute the regular query
    $sql = "SELECT * FROM items WHERE Availability = 'NO' LIMIT $startFrom, $resultsPerPage;";
    $result = mysqli_query($con, $sql);
    $resultCheck = mysqli_num_rows($result);
}

$totalRows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM items WHERE Availability = 'NO';"));
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comlab Inventory System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styleUserx.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="parent">
        <div class="child">
            <!-- Add this code for the search form -->
            <div class="search-container">
                <form method="GET" action="">
                    <div class="form-group">
                        <label for="search">Search:</label>
                        <input type="text" name="search" class="form-control" placeholder="Enter search term">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>

            <table class="table my-2" style="background-color: white;">
                <thead>
                    <tr>
                        <th scope="col">ITEM_ID</th>
                        <th scope="col">ITEM_NAME</th>
                        <th scope="col">ITEM_CLASSIFICATION</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">FACULTY_ID</th>
                        <th scope="col">USER</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $itemNum = $row['itemNum'];
                                $ItemName = $row['ItemName'];
                                $Classification = $row['Classification'];
                                $Availability = $row['Availability'];
                                $UserID = $row['UserID'];
                                $NameOfUser = $row['NameOfUser'];

                                echo '<tr>
                                <th scope="row">' . $itemNum . '</th>
                                <td>' . $ItemName . '</td>
                                <td>' . $Classification . '</td>
                                <td>' . $Availability . '</td>
                                <td>' . $UserID . '</td>
                                <td>' . $NameOfUser . '</td>
                                <td>
                                    <button class="btn btn-primary"><a href="EditReturnx.php?updateItem=' . $itemNum . '" class="text-light">Edit</a></button>
                                </td>
                            </tr>';
                            }
                        } else {
                            echo '<tr><td colspan="7">No Items Are Being Borrowed.</td></tr>';
                        }
                    ?>
                </tbody>
            </table>

            <!-- Pagination buttons -->
            <?php
                $totalPages = ceil($totalRows / $resultsPerPage);

                echo '<ul class="pagination justify-content-center">';
                if ($currentPage > 1) {
                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '">Previous</a></li>';
                }

                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<li class="page-item ' . ($i == $currentPage ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                }

                if ($currentPage < $totalPages) {
                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '">Next</a></li>';
                }

                echo '</ul>';
            ?>
        </div>
    </div>

    <div class="header">
        <div class="side-nav">
            <a href="Homex.php" class="logo">
                <img src="logo.png" class="logo-img">
                <img src="logo2.png" class="logo-icon">
            </a>
            <ul class="nav-links">
                <li><a href="Trackingx.php"><i class="fa-solid fa-eye"></i><p>ITEM TRACKING</p></a></li>
                <li><a href="Reportx.php"><i class="fa-solid fa-chart-simple"></i><p>REPORTS</p></a></li>
                <li><a href="logout.php"><i class="fa-solid fa-arrow-left"></i><p>LOGOUT</p></a></li>
                <div class="active"></div>
            </ul>
        </div>
    </div>
</body>
</html>
