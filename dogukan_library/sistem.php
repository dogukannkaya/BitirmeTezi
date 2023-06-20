<?php
ob_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = mysqli_connect($servername, $username, $password, "library");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
ob_end_flush();
?>
