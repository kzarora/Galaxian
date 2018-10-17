<?php
session_start();
require_once('dbcon1.php');
/*if(!isset($_SESSION['username'])){
	exit();
}*/

  function checklevel($username){
     global $conn;
     $sql = "SELECT curr_level FROM player WHERE username='$username'";
     if($conn->query($sql)==FALSE){
     	die($conn->error);
     }
     $result=$conn->query($sql);
     if($result->num_rows == 1){
        $row=$result->fetch_assoc();
        $curr=$row['curr_level'];
        $mydate=getdate(date("U"));
    	$today = date("d"); 
		$month=date("m");
		$start = 10;
		$today = ltrim($today, '0')-$start;
		$month = ltrim($month, '0');
		if($today != $curr-1){
			$sql = "UPDATE player set curr_level=($today+1) where username='$username'";
		    if($conn->query($sql)==FALSE){
     	die($conn->error);	
		}
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

  
?>