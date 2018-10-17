<?php
require("dbcon1.php");
session_start();
$name= $_SESSION['name'];
$email=$_SESSION['email'];
echo $email;
session_destroy();
/*$sql = "SELECT * FROM player WHERE username='$email'";
if($conn->query($sql)==FALSE){
	die($conn->error);

}
$result=$conn->query($sql);
//echo $result->num_rows;
if($result->num_rows==0){

 $sql = "INSERT INTO player(id, username, curr_level, pass) VALUES (NULL, '$email', '0', '12345')";
if($conn->query($sql)==FALSE){
	echo ($conn->error);

}
}*/

?>