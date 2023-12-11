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

            /* Adjust font size for the printed version */
            #printableTable table {
                font-size: 12px; /* Adjust the font size as needed */
            }

            #printableTable table th, #printableTable table td {
                font-size: 10px; /* Adjust the font size as needed */
                border: 1px solid #000; /* Add borders for better visibility */
                padding: 8px;
            }
        }
    </style>
</head>
<body>

<div class="parent">
    <div class="childleft">
        <a href="#" onclick="printData()"><img src="PIP.png" class="logo-img"></a>
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

    $sql = "SELECT * FROM items;";
    $result = mysqli_query($con, $sql);
    ?>

    <table>
        <!-- Your table headers here -->
        <thead>
            <tr>
                <th>Item Number</th>
                <th>Serial Number</th>
                <th>Item Name</th>
                <th>Classification</th>
                <th>Availability</th>
                <th>Faculty ID</th>
                <th>Name Of User</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['itemNum'] . '</td>';
                echo '<td>' . $row['SerialNum'] . '</td>';
                echo '<td>' . $row['ItemName'] . '</td>';
                echo '<td>' . $row['Classification'] . '</td>';
                echo '<td>' . $row['Availability'] . '</td>';
                echo '<td>' . $row['UserID'] . '</td>';
                echo '<td>' . $row['NameOfUser'] . '</td>';
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
