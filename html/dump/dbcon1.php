<?php
$user=$_SESSION['username'];
$servername = "localhost";
$user = "root";
$password = "Ygnajmer786";
$dbname = "galaxian";

// Create connection
$conn = new mysqli($servername, $user, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>