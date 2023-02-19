<?php
/*
 *	db.php
 *	DB connection information goes here
 *
 */

$host = "***";
$username = "***";
$password = "***";
$dbname = "***";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}
?>
