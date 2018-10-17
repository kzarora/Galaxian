<?php
session_start();
require_once('dbcon1.php');
if( !isset($_SESSION['username']) ){
   header("location:index.php");
}
  if(isset($_POST['submit'])){
    global $conn;
    $arr=array();
    $ques='';
    $level='';
    $arr = explode('_',$_POST['passkey1']);
    $username=$_SESSION['username'];
 
    //$sql="SELECT que_no_".$arr[2]."FROM `$username` WHERE level_no=".$arr[1];
    $sql="SELECT * FROM `$username`";
    if($conn->query($sql)==FALSE){
        die($conn->error);
    }
    $result=$conn->query($sql);
    if($result->num_rows >0){
        while($row=$result->fetch_assoc())
        {
        if($row['que_no_'.$arr[2]]==$_POST['passkey1']){
            $sql =  "SELECT curr_level FROM player where username='$username'";
            if($conn->query($sql)==FALSE){
                die($conn->error);
            }  
            $result=$conn->query($sql);
            $row=$result->fetch_assoc();
            
            $_SESSION['ques']=$arr[2];
            $_SESSION['level']=$arr[1];
            echo $row['curr_level'];
            if($row['curr_level']< $arr[1]){
                $str= '<script>alert("not accessible level");</script>';

            }
            else
            {
                $_SESSION['curr_level']=$row['curr_level'];

               header("location:editor_1.php");    
            }
            
            
        }
        }
        if($str!='')
            echo $str;
        else
        echo "wrong key";
    
    }
    

    }


?>

<HTML>
<head>
<style>
</style>
</head>
</HTML>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="POST" class="form"> 
 
    <label for="Passkey1">Enter passkey for level</label>
<input type="text" class="" id="" name="passkey1" style="width:50%" required>
    <input type="submit" class="btn btn-default" name="submit"><br><br>
</form>
</body>
</HTML>

 