<?php
include 'itemconnection.php';

$itemNum = $_GET['updateItem'];
$sql = "SELECT * FROM items WHERE itemNum = $itemNum";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$SerialNum = $row['SerialNum'];
$ItemName = $row['ItemName'];
$Classification = $row['Classification'];
$Availability = $row['Availability'];
$UserID = $row['UserID'];
$NameOfUser = $row['NameOfUser'];

// Fetch UserIDs, corresponding names, and last names from the Login table
$userIDQuery = "SELECT UserID, Fname, Lname FROM login";
$userIDResult = mysqli_query($con, $userIDQuery);

// Check if the query was successful
if ($userIDResult) {
    // Fetch UserIDs, names, and last names into an associative array
    $userIDs = mysqli_fetch_all($userIDResult, MYSQLI_ASSOC);
} else {
    // Handle the error
    echo "Error fetching UserIDs, names, and last names: " . mysqli_error($con);
}

if (isset($_POST['submit'])) {
    $newAvailability = $_POST['Availability'];
    $newUserID = ($_POST['UserID'] == 'None') ? NULL : $_POST['UserID'];
    $newNameOfUser = $_POST['NameOfUser'];

    // Check if there are no changes in the input fields
    if ($newAvailability == $Availability && $newUserID == $UserID && $newNameOfUser == $NameOfUser) {
        // No changes, redirect to Borrow.php
        header('location: Borrowx.php');
        exit();
    }

    // Update the item
    $sql = "UPDATE items SET Availability = ?, UserID = ?, NameOfUser = ? WHERE itemNum = $itemNum";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $newAvailability, $newUserID, $newNameOfUser);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            header('location: Borrowx.php');
            exit();
        } else {
            echo "Failed to update item";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error in prepared statement: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comlab Inventory System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styleUser.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="help">
        <form method="POST">

            <div class="form-group">
                <label>AVAILABILITY</label>
                <select class="form-control" name="Availability">
                    <option value="NO" <?php echo ($Availability == 'NO') ? 'selected' : ''; ?>>NO</option>
                    <option value="YES" <?php echo ($Availability == 'YES') ? 'selected' : ''; ?>>YES</option>
                </select>
            </div>

            <div class="form-group">
                <label>FACULTY</label>
                <select class="form-control" name="UserID">
                    <option value="None" <?php echo ($UserID == NULL) ? 'selected' : ''; ?>>None</option>
                    <?php
                    // Check if UserIDs, names, and last names were fetched successfully
                    if (isset($userIDs) && is_array($userIDs)) {
                        foreach ($userIDs as $user) {
                            $selected = ($user['UserID'] == $UserID) ? 'selected' : '';
                            echo "<option value='{$user['UserID']}' $selected>{$user['UserID']} - {$user['Lname']}, {$user['Fname']}</option>";
                        }
                    } else {
                        echo "<option value=''>No UserIDs available</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>NAME OF USER</label>
                <input type="text" class="form-control" placeholder="Enter User Name" name="NameOfUser" autocomplete="off" value=<?php echo $NameOfUser; ?>>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
    <div class="header">
        <div class="side-nav">
            <a href="Home.php" class="logo">
                <img src="logo.png" class="logo-img">
                <img src="logo2.png" class="logo-icon">
            </a>
            <ul class="nav-links">
                <li><a href="Users.php"><i class="fa-solid fa-user"></i><p>USERS</p></a></li>
                <li><a href="Tracking.php"><i class="fa-solid fa-eye"></i><p>ITEM TRACKING</p></a></li>
                <li><a href="Report.php"><i class="fa-solid fa-chart-simple"></i><p>REPORTS</p></a></li>
