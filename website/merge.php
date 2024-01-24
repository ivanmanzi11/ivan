<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$firstname = "root";
$businessname = "";
$dbname = "amazona";

$merge = mysqli_merge($servername, $firstname, $businessname,$dbname);

if (!$merge) {
    die("Connection failed: " . mysqli_connect_error());
}

// Additional code or checks can be added here if needed
?>
