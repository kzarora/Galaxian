<?php
session_start();
require_once('dbconnection.php');
if( !isset($_SESSION["signed_user"]) ){
    header("location:form.php");
    exit();
}


   $mydate=getdate(date("U"));
    $today = date("d"); 
	$month=date("m");

$today = ltrim($today, '0');
$month = ltrim($month, '0');
if($today>=2 && $month==8)
{
    echo "LEVEL 1 ";
	echo ' <form action="checkkey.php"  method="POST" class="form"> 
 
    <label for="Passkey1">Enter passkey for level 1</label>
    <input type="text" class="" id="" name="passkey1" style="width:50%">
	
	<button type="submit" class="btn btn-default">Submit</button><br><br>';
  
}
if($today>=2 && $month==8)
{
      echo "LEVEL 2";
	echo ' <br><form action="checkkey.php"  method="POST" class="form"> 
 
    <label for="Passkey">Enter passkey for level 2</label>
	
    <input type="text" class="" id="" name="passkey2" style="width:50%">
	<button type="submit" class="btn btn-default">Submit</button>';
}
?>

