<?php
//include('conn.php');
session_start();

//session_unset();
function fun(){
  $user=$_SESSION['username'];
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
for($i=1; $i<=6; $i++)
{
  $sql="insert into `$user` (level_no) values(".$i.");";
  if(!mysqli_query($conn,$sql))
    die ($conn->error);
}   

 $cipher= "A9QnWgKm9uEoP3t3fVlzbL16vFpO01eUkM82wGqN64dTjZx7rsHycBi8SYIa0CR5XJD";
 
 $level=0;
 $count=0;
 $ran=strlen($user);
 $len=$ran;

 $num=0;
for($k=1; $k<=6; $k++){
  
 $level++;
 $ran=strlen($user);
 $len=$ran;
 $count=0;
 $num=0;
 
 for($j=1; $j<=13; $j++){
  
 $str ="";
 for($i=0; $i<12; $i++)
{
  $ran=(ord($user[$count])%ord($user[$count+1]))+$ran+$num+$i;
  $ch=$cipher[($level+$ran)%67];
  $str=$str.$ch;
  if($ran%2==0)
   $ran+=3;
  else
   $ran=$num;
  $num++;
  if($count+1==$len)
  $count=$count%$len;
 
  }
       
  $sql="update `$user` set que_no_".$j."='".$str.'_'.$k.'_'.($j)."' where level_no=".$k;  
  //echo $sql;
   if(!mysqli_query($conn,$sql))
    die ($conn->error);    }
}
mysqli_close($con);
}
   //header("Location: login.php");
?>