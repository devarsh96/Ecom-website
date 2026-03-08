<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "bicycle_db";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $databasename);

// Check connection
if (!$conn) {
  echo "Connected unsuccessful";
}else{
  echo "Connected successfully";
}

?>