<?php
session_start();	
require("dbcon1.php");
require("update.php");
if(!isset($_SESSION['username'])){
	header("location:index.php");
}

$username=$_SESSION['username'];
 $sql = "SELECT * FROM player where username='$username'";
	if($conn->query($sql)==FALSE){
    die($conn->error);
  }
  $result=$conn->query($sql);
  if($result->num_rows>0){
    $row=$result->fetch_assoc();
  }
      
      
  //checklevel($username);
  if($row['flag']==0)
   {   
	    
           
       
        
      updatelevel($username);
     // creating directory
     $curdir = getcwd();
     chmod("users",0777);
     chdir("users");
      $dir='/questions';
    //make directory writable from everyone
        if(mkdir($username . $dir, 0777,true)){
 
			chmod($username,0777);//giving permission 
			chdir($username);
        		
            //echo "$path was made";
            //echo "<br>";
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
	   $sql="UPDATE player set flag=1 where username='$username'";
       if($conn->query($sql)==FALSE){
        die($conn->error);
       }
       else
       {
        //$username was taken from $post_[username]//	   
	   header("location:table.php");
     }	
        }
        else{
            echo "Failed to create directory";
        }
	
                        
		
	
   }//flag condition brace closed

	else{
 header("location:Play.php");
 }
 



	   
	   
	  
           

?>