<?php
include("loginconnection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comlab Inventory System</title>
    <link rel="stylesheet" type="text/css" href="styleindex.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>

    <?php $displayValue = "block"; ?>
    <style>
        body {
            background-image: url('Wallpaper.gif');
            background-position: center;
            margin: 0;
            font-family: Arial, sans-serif;
            overflow: hidden;
        }

        #form {
            background-color: white;
            width: 25%;
            margin: 120px auto;
            padding: 50px;
            box-shadow: 10px 10px 5px rgb(37, 3, 99);
            border-radius: 6px;
        }

        #btn {
            color: white;
            background-color: green;
            padding: 10px;
            font-size: large;
            border-radius: 10px;
            cursor: pointer;
        }

        #btn:hover {
            background-color: darkgreen;
        }

        @media screen and (max-width: 700px) {
            #form {
                width: 65%;
                padding: 40px;
            }
        }

        .error {
            color: #af42af;
            background-color: #fde8ec;
            padding: 5px;
            display: none;
            transform: translateY(-20px);
            margin-bottom: 10px;
            font-size: 8px;
        }
    </style>
</head>
<body>
    <div id="form">
        <h1>Welcome to Comlab Monitoring System</h1>
        <form name="form" action="login.php" method="POST">
            <label>Username: </label>
            <input type="text" id="user" name="user"><br><br>
            <label>Password: </label>
            <input type="password" id="pass" name="pass"><br><br>
            <p class="error">Invalid Username or Password</p>
            <input type="submit" id="btn" value="Login" name="submit">
        </form>
    </div>
</body>
</html>
