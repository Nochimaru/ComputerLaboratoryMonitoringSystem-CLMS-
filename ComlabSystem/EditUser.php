<?php
  include 'show.php';

  $UserID=$_GET['updateID'];
  $sql="Select * from login where UserID=$UserID";
  $result = mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $UserID=$row['UserID'];
  $Fname=$row['Fname'];
  $Lname=$row['Lname'];
  $Username = $row['Username'];
  $Password = $row['Password'];
  $UserClassification=$row['UserClassification'];


  if(isset($_POST['submit'])){

    $Username=$_POST['Username'];
    $Password=$_POST['Password'];
    $Fname=$_POST['Fname'];
    $Lname=$_POST['Lname'];
    $UserClassification=$_POST['UserClassification'];

    $sql="update login set UserID=$UserID,Fname='$Fname',Username='$Username',Password='$Password',Lname='$Lname',UserClassification='$UserClassification' where UserID = $UserID";
    $result = mysqli_query($con,$sql);

    if($result){
      header('location:Users.php');
    }else{
      die(mysqli_error($con));
    }
  }

?>

<!DOCTYPE html>
<?php
    include("show.php");

    $Username 
?>
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
          <label>Username</label>
          <input type="text" class="form-control" placeholder="Enter your Username" name="Username" autocomplete="off" value=<?php echo $Username;?>>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" placeholder="Enter your Password" name="Password" autocomplete="off" value=<?php echo $Password;?>>
        </div>

        <div class="form-group">
          <label>First Name</label>
          <input type="text" class="form-control" placeholder="Enter your First name" name="Fname" autocomplete="off" value=<?php echo $Fname;?>>
        </div>

        <div class="form-group">
          <label>Last Name</label>
          <input type="text" class="form-control" placeholder="Enter your Last name" name="Lname" autocomplete="off" value=<?php echo $Lname;?>>
        </div>

        <div class="form-group">
          <label>User Classification</label>
          <input type="text" class="form-control" placeholder="Enter your User Classification" name="UserClassification" autocomplete="off" value=<?php echo $UserClassification;?>>
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
                <li><a href="logout.php"><i class="fa-solid fa-arrow-left"></i><p>LOGOUT</p></a></li>
                <div class = "active"></div>
            </ul>
        </div>
    </div>


</body>

</html>