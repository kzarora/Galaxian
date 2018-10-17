<?php
require("answer.php");
require("level3/Version18_level3begin.php");
//session_start();
$temp=$_REQUEST['code'];
$mode=$_REQUEST['lang'];

if($_SESSION['level']!=4){
   $obj = new answer($temp,".cpp"); 
  echo    $obj->getanswer();
  //echo "level";
}
else if($_SESSION['level']==4){
	$temp1="#include <stdio.h>".PHP_EOL."#include<math.h>".PHP_EOL."#include<ctype.h>".PHP_EOL."#include<stdlib.h>".PHP_EOL;
  $temp = shub_to_adi($temp);
  $obj = new answer($temp1.$temp,".c"); 
  echo $obj->getanswer(); 	
}


  /* $sql="SELECT curr_acc"
   $_SESSION['code']=$temp;
   $obj = new answer($temp,".cpp");
   echo    $obj->getanswer();*/
?>
