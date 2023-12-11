<?php
include 'itemconnection.php';

if(isset($_GET['deleteItem'])){
    $itemNum = $_GET['deleteItem'];

    $sql="delete from items where itemNum=$itemNum";
    $result = mysqli_query($con,$sql);
    if($result){
        header('location:ItemTracking.php');
    }else{
        die(mysqli_error($con));
    }
}
?>