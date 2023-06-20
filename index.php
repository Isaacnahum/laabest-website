<?php
include ('config.php');
if(isset($_POST['create'])){
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$username=$_POST['username'];
$password=$_POST['password'];
$insertdata="insert into registerme(firstname,lastname,username,password)values('$firstname','$lastname','$username','$password')";
$result=mysqli_query($con, $insertdata);
if($result){
    echo "<script>alert('Account Created Successfully!')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" type="text/css" href="styleb.css">
</head>
<body>
<div class="container">
  <a href="login.php">Log Out</a>
    <div style="text-align:center; margin-top:10%;">
    <h1>CREATE ACCOUNT</h1>
    <h3>Don't forget the password you are creating now</h3>
    <form action="login.php" method="POST">
Firstname: <input type="text" name="firstname"><br><br>
Lastname: <input type="text" name="lastname"><br><br>
Username: <input type="text" name="username"><br><br>
Password: <input type="password" name="password"><br><br>
<input type="submit" name="create" value="CREATE ACCOUNT" >
    </form>
    "Remember this password"
</div>
<script src="regex.js"></script>
</div>
</body>
</html>
