<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "job_application";

$conn = mysqli_connect("localhost", "root", "", "job_application");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
