<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
require_once('dbcon1.php');
if(!isset($_SESSION["username"])){
  //$_SESSION['error']="username no set";
	header("location:index.php");
}
else{
  function checklevel($username){
     global $conn;
     $sql = "SELECT curr_level FROM player WHERE username='$username'";
     if($conn->query($sql)==FALSE){
     	die($conn->error);
     }
   //  echo $username;
     $result=$conn->query($sql);
     if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        $curr=$row['curr_level'];
        $mydate=getdate(date("U"));
    	$today = date("d"); 
		$month=date("m");
		$start = 23;
		$today = ltrim($today, '0')-($start-1);
    //echo $today;
			$sql = "UPDATE player set curr_level=$today where username='$username'";
		    if($conn->query($sql)==FALSE){
     	die($conn->error);	
		}
   
  
     }
   
  }
  function updatelevel($username){
    global $conn;
    echo "update1";
    $sql1="INSERT INTO level1(username) values('$username')";
    $sql2="INSERT INTO level2(username) values('$username')";
    $sql3="INSERT INTO level3(username) values('$username')";
    $sql4="INSERT INTO level4(username) values('$username')";
    $sql5="INSERT INTO level5(username) values('$username')";

    if($conn->query($sql1)==FALSE){
        echo($conn->error);
    }
    if($conn->query($sql2)==FALSE){
        echo($conn->error);
    }
    if($conn->query($sql3)==FALSE){
        echo($conn->error);
    }
    if($conn->query($sql4)==FALSE){
        echo($conn->error);
    }
    if($conn->query($sql5)==FALSE){
        echo($conn->error);
    }
}
}
?>