 <?php
session_start();
require_once('dbcon1.php');
if( !isset($_SESSION['username']) ){
   header("location:index.php");
}

  
    
   if($_POST['passkey1']!=$_POST['passkey2'] && $_POST['passkey1']!=$_POST['passkey3'] &&$_POST['passkey1']!=$_POST['passkey4'] &&$_POST['passkey1']!=$_POST['passkey5'] )
   {
   if(!empty($_POST)) {
  $_POST = array_map("trim", $_POST);
}
    $count=0;
   $username=$_SESSION['username']; 
   
   for($i=1;$i<=5;$i++)
    {
    $arr=array();
    $arr = explode('_',$_POST['passkey'.$i]);
   // echo $arr[2]." ";
  //  $sql="SELECT que_no_".$arr[2]."FROM `$username` WHERE level_no=5;
   
    //echo  $arr[2]." ";
     $sql="SELECT * FROM `$username` where level_no=5";
        
    if($conn->query($sql)==FALSE){
        die($conn->error);
    }
    $result=$conn->query($sql);   
   if($result->num_rows>0){
      
         while($row=$result->fetch_assoc()) 
        {
             $x=$row['que_no_'.$arr[2]]; 
             $y=$_POST['passkey'.$i];
             if(strcmp($x,$y)==0)
             {
              
                $count++;
              }
         }
        }  
      
    }///for loop 
      echo $count;
      if($count==10);
        header("location:level_5.php");
        }
        else
        echo 'Wrong Key';
 //isset brace        
 ?> 