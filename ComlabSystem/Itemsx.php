<?php
include 'itemconnection.php';

if (isset($_POST['submit'])) {
    $SerialNum = $_POST['SerialNum'];
    $ItemName = $_POST['ItemName'];
    $Classification = $_POST['Classification'];
    $Availability = $_POST['Availability'];

    // Check if all textboxes have input
    if (empty($SerialNum) || empty($ItemName) || empty($Classification) || empty($Availability)) {
        header('location: itemTrackingx.php');
        exit();
    }

    $sql = "INSERT INTO items (SerialNum, ItemName, Classification, Availability, UserID) VALUES ('$SerialNum', '$ItemName', '$Classification', '$Availability', NULL)";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location: Itemsx.php');
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <h1 class="my-5"><center>COMPUTER LABORATORY</center></h1>
    <h3 class="my-5"><center>MONITORING SYSTEM</center></h3>
    <title>Comlab Inventory System</title>
</head>

<body>
    <div class="welcome">
        <div class="container my-5" style="background-color: #F3CF74;">
            <form method="POST">

                <div class="form-group">
                    <label>Serial Number</label>
                    <input type="text" class="form-control" placeholder="Enter Serial Number" name="SerialNum" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Item Name</label>
                    <input type="text" class="form-control" placeholder="Enter Device Name" name="ItemName" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Classification</label>
                    <input type="text" class="form-control" placeholder="Enter Device Classification" name="Classification" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Availability</label>
                    <select class="form-control" name="Availability">
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success my-3" name="submit">Submit</button>
                <button class="btn btn-primary"><a href="itemTrackingx.php" class="text-light">Back</a></button>
            </form>
        </div>
    </div>
</body>

</html>
