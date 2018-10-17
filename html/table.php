 <?php
session_start();
require("access_code_.php");
if( !isset($_SESSION["username"]) ){
 //$_SESSION['error']="username no set";
    header("location:index.php");
    
}
 
$servername = "localhost";
$username = "root";
$password = "Ygnajmer786";
$dbname = "galaxian";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username=$_SESSION["username"];
//$user="akshat";
// sql to create table
 $query = "create table `$username`( level_no integer(3),que_no_1 varchar(20),que_no_2 varchar(20),que_no_3 varchar(20),que_no_4 varchar(20),que_no_5 varchar(20),que_no_6 varchar(20),que_no_7 varchar(20),que_no_8 varchar(20),que_no_9 varchar(20),que_no_10 varchar(20),que_no_11 varchar(20),que_no_12 varchar(20),que_no_13 varchar(20), PRIMARY KEY(`level_no`))";
if ($conn->query($query) == TRUE) {
	fun();
    
} else {
    echo ("Error creating table: " . $conn->error);
}
header("location:Play.php");
$conn->close();
?> 