<?php
include("loginconnection.php");

$username_error = null;
$password_error = null;
$display_error = "none";

if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM login WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Check the UserClassification from the database
        $userClassification = $row['UserClassification'];

        if ($userClassification == 'Admin' || $userClassification == 'Administrator') {
            // Redirect to Home.php if the UserClassification is Admin or Administrator
            header("Location: http://localhost/ComlabSystem/Home.php");
            exit(); // Ensure that the script stops execution after the redirect
        } else {
            // Redirect to Homex.php for other UserClassifications
            header("Location: http://localhost/ComlabSystem/Homex.php");
            exit(); // Ensure that the script stops execution after the redirect
        }
    } else {
        // Display an error message if the username and password do not match
        $display_error = "block";
        header("Location: index.php");
        exit(); // Ensure that the script stops execution after the redirect
    }
}
?>
