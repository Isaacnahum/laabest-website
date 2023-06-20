<?php
$dbHost = 'localhost';
$dbName = 'gajax';
$dbUsername = 'root';
$dbPassword = '';
$db= mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
?>


<?php
$con=new mysqli('localhost','root','','stemdb');
if(!$con){
    die(mysqli_error($con));
}
?>