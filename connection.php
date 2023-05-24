<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pabw";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection Failed" . mysqli_connect_error());
} 
?>