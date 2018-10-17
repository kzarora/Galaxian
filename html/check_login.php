<?php
session_start();	
require_once('dbconnection.php');

 $stmt = $pdo->prepare('SELECT * FROM player WHERE username = :username && pass= :pass');
   $stmt->bindParam(':username', $username);
    $stmt->bindParam(':pass', $pass);

   $username=$_POST["username"];
   $_SESSION["username"]=$username;
   $pass=$_POST["pass"];
   $stmt->execute();
   $count = $stmt->rowCount();
   if($count==1)
   {
    //global $username;
    require("update.php");

	   //log in done!!!!
	  // $_SESSION["username"]=$_SESSION['email'];
     
  $post = $stmt->fetch();
  $id=$post->id;
  $_SESSION["signed_user"]=$id;
    checklevel($username);
   if($post->flag==1)
   {   
     
          echo "hello";
    // updatelevel($username);
	   // creating directory
	   $curdir = getcwd();
       //echo $curdir;
     chmod("users",0777);
	   chdir("users");
       echo getcwd();
      //giving permission
	   //Name directory after username
    //$path = $username; //getting unique id
	
	$dir='/questions';
   echo $username.$dir;
    //make directory writable from everyone
        if(mkdir($username . $dir, 0777,true)){
 
			chmod($username,0777);//giving permission 
			chdir($username);
        		
            //echo "$path was made";
            //echo "<br>";
        }
        else{
            echo "Failed to create directory";
        }
		chmod("questions",0777);
		chdir("questions");
                        
		
		for($i=1;$i<=10;$i++)
		{
			mkdir('level'.$i,777);
                        
                        chmod('level'.$i,0777);
		}
    $dir =getcwd();
    for($k=1;$k<=10;$k++)
    {
   
		chdir("level".$k);
		for($i=1;$i<=10;$i++)
		{
			mkdir('q'.$i,777);
  			chmod('q'.$i,0777);
		}
    chdir($dir);
  }
	   $sql='update player set flag=1 where username=:username';
       $stmt = $pdo->prepare($sql);
       $stmt->execute(['username' => $username]); //$username was taken from $post_[username]//	   
	   
   }//flag condition brace closed

	header("location:table.php");	
	
	}
	   
	   
	   else
		   echo 'sign in failed';
           

?>