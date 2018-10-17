<?php
session_start();
require("dbcon1.php");
if(!isset($_REQUEST['id']) && !isset($_REQUEST['name']) && !isset($_REQUEST['email']) && !isset($_REQUEST['img']))
{
	header("location:index.php");

}
$id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$img=$_REQUEST['img'];

$_SESSION['id']=$id;
$_SESSION['name']=$name;
if($email!=""){
$_SESSION['username']=$email;
}
else{
header("location:index.html");
}
$sql = "SELECT * FROM player WHERE username='$email'";
if($conn->query($sql)==FALSE){
	die($conn->error);

}
$result=$conn->query($sql);

if($result->num_rows==0){

 $sql = "INSERT INTO player(username,name, curr_level) VALUES ('$email','$name', '0')";
       if($conn->query($sql)==FALSE){
	       die ($conn->error);
           
}
}
//header("location:check_login1.php");
?>