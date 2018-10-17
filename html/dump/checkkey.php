<?php
 session_start();
require_once('dbcon1.php');
if( !isset($_SESSION["signed_user"]) ){
    header("location:form.php");
    exit();
}
	$id=$_SESSION["signed_user"];
	$username=$_SESSION['username'];
	
   if (isset($_POST["passkey1"]) && !empty($_POST["passkey1"]))
 {
		$result = $conn->query('SELECT * FROM  WHERE id = :id');
   $stmt->bindParam(':id', $id);
   $key=$_POST["passkey1"];
    $stmt->execute();
  $post=$stmt->fetch();
  
   if($post->q1==$key)
   {
	   
		   $dir = getcwd();
		  // echo $dir;
                   chdir($dir);
		   chdir($id);
		   chdir("questions");
		   chdir("level1");
		   chdir("q1");
		    $dir = getcwd();
			  //echo $dir;
			  
			// $file = fopen(".\hello.php","r"); 
		   $filename = "$dir\hello.php";
		   $d=file_get_contents($filename);
           echo $d;
   }
  // else if($post->q2==$key)
	  
  }
   

?>
  $mydate=getdate(date("U"));
    $today = date("d"); 
	$month=date("m");

$today = ltrim($today, '0');
$month = ltrim($month, '0');
echo ' <form action="checkkey.php"  method="POST" class="form"> 
 
    <label for="Passkey1">Enter passkey for level</label>
    <input type="text" class="" id="" name="passkey1" style="width:50%">
    
    <button type="submit" class="btn btn-default">Submit</button><br><br>';
?>

