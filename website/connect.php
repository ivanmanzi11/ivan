<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amazona";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Additional code or checks can be added here if needed
?>
