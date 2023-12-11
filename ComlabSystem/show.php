<?php
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "comlabsystem";

$con = mysqli_connect($sname, $uname, $password, $db_name);

if(!$con){
	die(mysqli_error($con));
}
echo "";

?>