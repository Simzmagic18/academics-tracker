<?php 

$host = 'localhost';   // server name
 $user='root';
 $pass= ''; //server password
 $db='academicstracker2'; // db name

$conn = mysqli_connect($host, $user, $pass, $db);

if(mysqli_connect_errno()) echo "Failed to connect to MySQL: ".mysqli_connect_error();
session_start();

?>