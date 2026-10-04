<?php
include "db.php";

$id = (int) $_GET['id'];
mysqli_query($conn, "DELETE FROM users WHERE id = $id");

header("Location: html.php");
exit;
?>