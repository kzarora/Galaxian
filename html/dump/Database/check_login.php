<?php

session_start();	
require_once('dbconnection.php');
 $stmt = $pdo->prepare('SELECT * FROM player WHERE username = :username && pass= :pass');
   $stmt->bindParam(':username', $username);
    $stmt->bindParam(':pass', $pass);
	$username=$_POST["username"];
   $pass=$_POST["pass"];
   $stmt->execute();
   $count = $stmt->rowCount();
   if($count==1)
   {
	   //log in done!!!!
	   echo 'sign in successfull';
	   
  $post = $stmt->fetch();
  $id=$post->id;
  $_SESSION["signed_user"]=$id;
   if($post->flag==0)
   {
	   // creating directory
	   $curdir = getcwd();
	   chdir($curdir);
	   //Name directory after username
    $path = $id; //getting unique id
	
	$dir='/questions';
   
    //make directory writable from everyone
        if(mkdir($path . $dir, 0777,true)){
			chdir($path);
			
            echo "$path was made";
            echo "<br>";
        }else{
            echo "Failed to create directory";
        }
		chdir("questions");
		for($i=1;$i<=10;$i++)
		{
			mkdir('level'.$i,0777);
		}
		chdir("level1");
		for($i=1;$i<=10;$i++)
		{
			mkdir('q'.$i,0777);
		}
	   $sql='update player set flag=1 where username=:username';
       $stmt = $pdo->prepare($sql);
       $stmt->execute(['username' => $username]); //$username was taken from $post_[username]//	   
	   
   }//flag condition brace closed
   
   
    function keys($username,$i)
{
	 $keyy=$username.'q'.$i;
	 return $keyy;
}


$q1=keys($username,'1');$q2=keys($username,'2');
$q3=keys($username,'3');$q4=keys($username,'4');$q5=keys($username,'5');
$q6=keys($username,'6');$q7=keys($username,'7');$q8=keys($username,'8');
$q9=keys($username,'9');$q10=keys($username,'10');
$id=$_SESSION["signed_user"];
  $sql = 'INSERT INTO level1(id,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10 ) VALUES(:id,:q1, :q2,:q3,:q4,:q5,:q6,:q7,:q8,:q9,:q10)';
   $stmt = $pdo->prepare($sql);
  $stmt->execute(['q1' => $q1, 'q2' => $q2, 'q3' => $q3, 'q4' => $q4, 'q5' => $q5, 'q6' => $q6,
  'q7' => $q7, 'q8' => $q8, 'q9' => $q9, 'q10' => $q10,'id' =>$id ]);
   echo 'Post Added';
   

$q1=keys($username,'a');$q2=keys($username,'b');
$q3=keys($username,'c');$q4=keys($username,'d');$q5=keys($username,'e');
$q6=keys($username,'f');$q7=keys($username,'g');$q8=keys($username,'h');
$q9=keys($username,'i');$q10=keys($username,'j');
$id=$_SESSION["signed_user"];
  $sql = 'INSERT INTO level2(id,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10 ) VALUES(:id,:q1, :q2,:q3,:q4,:q5,:q6,:q7,:q8,:q9,:q10)';
   $stmt = $pdo->prepare($sql);
  $stmt->execute(['q1' => $q1, 'q2' => $q2, 'q3' => $q3, 'q4' => $q4, 'q5' => $q5, 'q6' => $q6,
  'q7' => $q7, 'q8' => $q8, 'q9' => $q9, 'q10' => $q10,'id' =>$id ]);
   echo 'Post Added';
	
	
	
	
	
	   header("location:level.php");
	}//login check brace closed
	   
	   
	   else
		   echo 'sign in failed';
           

?>