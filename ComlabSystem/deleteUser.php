<?php
include 'show.php';

if(isset($_GET['deleteID'])){
    $UserID = $_GET['deleteID'];

    $sql="delete from login where UserID=$UserID";
    $result = mysqli_query($con,$sql);
    if($result){
        header('location:Users.php');
    }else{
        die(mysqli_error($con));
    }
}
?>