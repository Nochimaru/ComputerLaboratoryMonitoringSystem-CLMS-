<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comlab Inventory System - User Report</title>
    <link rel="stylesheet" type="text/css" href="styleHomex.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>

    <style>
        /* Add your additional styles here if needed */
        /* For example, you might want to style the printed content */
        @media print {
            body * {
                visibility: hidden;
            }

            #printableTable, #printableDate, #printableTable *, #printableDate * {
                visibility: visible;
            }

            #printableTable {
                position: absolute;
                left: 0;
                top: 0;
            }

            #printableDate {
                position: absolute;
                left: 0;
                top: 100%;
            }
        }
    </style>
</head>
<body>

<div class="parent">
    <div class="childleft">
        <a href="#" onclick="printData()"><img src="PUP.png" class="logo-img"></a>
    </div>
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
            <li><a href="logout.php"><i class="fa-solid fa-arrow-left"></i><p>LOGOUT</p></a></li>
            <div class="active"></div>
        </ul>
    </div>
</div>

<script>
    function printData() {
        var printContents = document.getElementById("printableTable").outerHTML;
        var printDate = document.getElementById("printableDate").innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = '<div>' + printContents + '</div><div>' + printDate + '</div>';

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

<div id="printableTable">
    <?php
    include("itemconnection.php");

    $sql = "SELECT * FROM login;";
    $result = mysqli_query($con, $sql);
    ?>

    <table>
        <!-- Your table headers here -->
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>UserClassification</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['UserID'] . '</td>';
                echo '<td>' . $row['Username'] . '</td>';
                echo '<td>' . $row['Password'] . '</td>';
                echo '<td>' . $row['Fname'] . '</td>';
                echo '<td>' . $row['Lname'] . '</td>';
                echo '<td>' . $row['UserClassification'] . '</td>';
                // Add more columns as needed
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<div id="printableDate">
    <p>Date and Time: <?php echo date("Y-m-d H:i:s"); ?></p>
</div>

</body>
</html>
