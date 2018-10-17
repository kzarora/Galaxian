<?php
session_start();
require("dbcon1.php");
if(!isset($_REQUEST['id']) || !isset($_REQUEST['name']) || !isset($_REQUEST['email']) || !isset($_REQUEST['img']))
{
	echo '<script>alert("not set");</script>';
	exit();

}
$id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$img=$_REQUEST['img'];

$_SESSION['id']=$id;
$_SESSION['name']=$name;
$_SESSION['username']=$email;

$sql = "SELECT * FROM player WHERE username='$email'";
if($conn->query($sql)==FALSE){
	die($conn->error);

}
$result=$conn->query($sql);

if($result->num_rows==0){

 $sql = "INSERT INTO player(username, curr_level) VALUES ('$email', '0')";
       if($conn->query($sql)==FALSE){
	       echo ($conn->error);
           
}
}
//header("location:check_login1.php");
?>