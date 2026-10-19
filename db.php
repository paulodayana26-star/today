<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "jobdb";
$port = 3307;

$conn = mysqli_connect($host, $user, $password, $dbname, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>