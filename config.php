<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'student';
$con=mysqli_connect("$dbHost","$dbUsername","$dbPassword","$dbName") or die(mysqli_error());
//echo "Connection Successfully!!!";
?>