<?php
 session_start();
 include('config.php');
 if(isset($_POST['login']))
 {
     $username=$_POST['username'];
     $password=$_POST['password'];
     $query = mysqli_query($con,"select * from registerme where username='$username' && password='$password'");
     $count = mysqli_num_rows($query);
     $row = mysqli_fetch_array($query);
     if($count > 0)
     {
         $_SESSION['firstname']=$row['first name'];
         header('location:home.php');
     }
     else
     {
         echo "<script>alert('Invalid username or password')</script>";
     }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="styleb.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <br>
    <br>
    <a href="createaccount.php">create account for login if there is not any</a>
    <div style="text-align:center; margin-top:10%;">
        <h1>Login page</h1>
        <form action="home.php" method="POST">
        
            <input type="text"  placeholder="Enter username" name="username"><br><br>
            <input type="password" placeholder="Enter Password" name="password"><br><br>
            <br>
            <input type="submit" class="login" name="login" value="LOGIN">
        </form>
    </div> 
</div>
</body>
</html>