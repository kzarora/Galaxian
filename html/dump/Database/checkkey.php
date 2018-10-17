<?php
 session_start();
require_once('dbconnection.php');
if( !isset($_SESSION["signed_user"]) ){
    header("location:form.php");
    exit();
}
	$id=$_SESSION["signed_user"];
	
	
	 if (isset($_POST["passkey2"]) && !empty($_POST["passkey2"]))
    	$stmt = $pdo->prepare('SELECT * FROM level2 WHERE id = :id');
	
 if (isset($_POST["passkey1"]) && !empty($_POST["passkey1"]))
 {
		$stmt = $pdo->prepare('SELECT * FROM level1 WHERE id = :id');
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