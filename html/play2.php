<?php
session_start();
require_once('dbcon1.php');
if( !isset($_SESSION['username']) ){
   header("location:index.php");
}
  if(isset($_POST['submit']) && $_POST['passkey1']!=" "){
    global $conn;
    $_POST = array_map("trim", $_POST);
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
             echo $row['que_no_'.$arr[2]];
                $_SESSION['curr_level']=$row['curr_level'];

               header("location:editor_1.php");    
            }
            
            
        }
        }
        if($str!='')
            echo $str;
        else
        {
        echo '<script>alert("wrong");</script>';
        
        }
    
    }
    

    }
    
    
    
    
    
   
    
    
    
    
    


?>

<!DOCTYPE html>
<html>
<head>
<!--<meta http-equiv="refresh" content="15"> -->
 <link rel="shortcut icon" href="https://version18.in/img/shortcut.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="required.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Hanalei+Fill" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Caveat+Brush" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Wallpoet" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Vast+Shadow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cutive" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<title>Galaxian</title>

<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
tr:hover {background-color: #f5f5f5;}



.button {
    font-family: 'Cutive' ,serif;
    background-color: rgba(155, 100, 100, 0.4);
    padding: 10px;
    text-align: center;
    display: inline-block;
    font-size: 30px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    z-index: 2;
    color: #00FFFF; 
    border: 5px solid #00FFFF;
    border-radius: 25px;
    margin: 4px;
    opacity: 0.75;
}  
}
.log_but {
  
}
.reg_but{
  visibility: hidden;
}
.log_but:hover {
  
    background-color: #303030;
    color: white;
    opacity: 1;
}

@media screen and (max-width: 675px){
.log_but{
  visibility: hidden;
}
.reg_but{
  cursor:pointer;
  font-size: 20px;
  visibility: visible;
}

}



/* My buttons end */


/* Background image animation */
.hero-bkg-animated {
  background:url("bg6.jpg");
  background-position: center;
  background-size: cover;
  height: auto;
  width: auto;
  margin: 0;
  text-align: center;
  
}


/* Background Image close */



 /* my galaxian */
@import url(https://fonts.googleapis.com/css?family=Montserrat);

svg {
    font-size: 1500%;
    width: 50%;
    height: 7%;
    margin: auto;
}

.text-copy {
    fill: none;
    stroke: blue;
    stroke-dasharray: 3% 9%;
    stroke-width: 7px;
    stroke-dashoffset: 0%;
    animation: stroke-offset 5s infinite linear;
}

.text-copy:nth-child(1){
  stroke: #FFCCFF;
  animation-delay: -1s;
}

.text-copy:nth-child(2){
  stroke: #CCFF66;
  animation-delay: -2s;
}

.text-copy:nth-child(3){
  stroke: #C0C0C0;
  animation-delay: -3s;
}

.text-copy:nth-child(4){
  stroke: #33FFCC;
  animation-delay: -4s;
}

.text-copy:nth-child(5){
  stroke: #0066FF;
  animation-delay: -5s;
}

@keyframes stroke-offset{
  100% {stroke-dashoffset: -35%;}
}
.pasky{
  font-size: 20px;
  color: blue;
  width: 300px;
  height: 30px;
  margin-right:1%;  

}
@media screen and (max-width: 675px){
.pasky{
  visibility: hidden;
}
}
.img-replace {
  /* replace text with an image */
  display: inline-block;
  overflow: hidden;
  text-indent: 100%; 
  color: transparent;
  white-space: nowrap;
}
.bts-popup {
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  opacity: 0;
  visibility: hidden;
  -webkit-transition: opacity 0.3s 0s, visibility 0s 0.3s;
  -moz-transition: opacity 0.3s 0s, visibility 0s 0.3s;
  transition: opacity 0.3s 0s, visibility 0s 0.3s;
}
.bts-popup.is-visible {
  opacity: 1;
  visibility: visible;
  -webkit-transition: opacity 0.3s 0s, visibility 0s 0s;
  -moz-transition: opacity 0.3s 0s, visibility 0s 0s;
  transition: opacity 0.3s 0s, visibility 0s 0s;
}

.bts-popup-container {
  position: relative;
  width: 90%;
  max-width: 400px;
  margin: 18em auto;
  background: #4CB1FD;
  border-radius: 10%;
  border:1px solid black; 
  text-align: center;
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
  -webkit-transform: translateY(-40px);
  -moz-transform: translateY(-40px);
  -ms-transform: translateY(-40px);
  -o-transform: translateY(-40px);
  transform: translateY(-40px);
  /* Force Hardware Acceleration in WebKit */
  -webkit-backface-visibility: hidden;
  -webkit-transition-property: -webkit-transform;
  -moz-transition-property: -moz-transform;
  transition-property: transform;
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  transition-duration: 0.3s;
}
.bts-popup-container img {
  padding: 20px 0 0 0;
}
.bts-popup-container p {
	color: white;
  padding: 10px 40px;
}
.bts-popup-container .bts-popup-button {
  padding: 5px 25px;
	display: inline-block;
  margin-bottom: 10px;
}

.bts-popup-container a {
  color: white;
  text-decoration: none;
  text-transform: uppercase;
}






.bts-popup-container .bts-popup-close {
  position: absolute;
  top: 8px;
  right: 8px;
  width: 30px;
  height: 30px;
}
.bts-popup-container .bts-popup-close::before, .bts-popup-container .bts-popup-close::after {
  content: '';
  position: absolute;
  top: 12px;
  width: 16px;
  height: 3px;
  background-color: white;
}
.bts-popup-container .bts-popup-close::before {
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  left: 8px;
}
.bts-popup-container .bts-popup-close::after {
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
  right: 6px;
  top: 13px;
}
.is-visible .bts-popup-container {
  -webkit-transform: translateY(0);
  -moz-transform: translateY(0);
  -ms-transform: translateY(0);
  -o-transform: translateY(0);
  transform: translateY(0);
}

</style>
</head>
<!--oncontextmenu="return false;"-->
<body oncontextmenu="return false;" class="hero-bkg-animated" style="text-align: center;">

<!-- my galaxian logo -->
<img src="g3.png" style="width: 50%;height: 20%;padding-top: 1%;">

<!-- loader in center -->
<div class="loader-box">
<br>
<form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="POST" class="form"> 
<div style="padding-top: 10%;">
<input type="text" name="passkey1" placeholder="Enter your pass key here..."  class="pasky" required>  
<button class="button log_but" name="submit" style="margin-right:%">Play</button>


<?php
 $username=$_SESSION['username'];
$sql="SELECT * FROM player WHERE username='$username'";

  if($conn->query($sql)==FALSE){
        die($conn->error);
    }
    
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc();
        
          
        if($row['curr_level']==5)
        {
          
           echo "<span style='color:white;font-size:2em'>Access Level 5</span> ";
           echo "<form action='level5key.php' method='post' class='form' >
         
<button class='button log_but' name='submit-5' style=' border-radius: 25px;'>Go</button>

            
           </form>";
          }
          
  }
  
?>


</div>

</form>
<br/>
<a href="https://drive.google.com/file/d/17NfX21U5nd4rvlMvFJZPU1b3C_WTDctY/view" target="_blank"><button class="button log_buts" style="font-size:15px;">Click here to download the game</button></a>
<div>
<button class="button reg_but">Please open in Desktop</button>
</div>


<?php
 $username=$_SESSION['username'];
$sql="SELECT * FROM player WHERE username='$username'";

  if($conn->query($sql)==FALSE){
        die($conn->error);
    }
    
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc();
        
          
        if($row['curr_level']==5)
        {
          
           echo "<h3 style='color:white;font-size:2em'>Access Level 5</h3> ";
           echo "<form action='level5key.php' method='post' class='form' >
         
<button class='button log_but' name='submit-5' style=' border-radius: 25px;'>Go</button>

            
           </form>";
          }
          
  }
  
?>
</div>
<div class="bts-popup" role="alert">
    <div class="bts-popup-container">
      <form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="POST" class="form"> 
<div style="padding-top: 10%;">
<input type="text" name="passkey1" placeholder="Enter your pass key here..."  class="pasky" required>  


				<div class="bts-popup-button">
		       <button class="button log_but" name="submit" style="margin-right:%">Play</button></form>
         </div>
        <a href="#0" class="bts-popup-close img-replace">Close</a>
    </div>
</div>






<!-- my navigation bar at bottom -->
<div class="navbar" id="myNavbar">
  <a href="Play.php" class="active">Play</a>
  <a id="" href="leaderboard.php">Leader Board</a>
  <a href="Rules.php" >Rules</a>
    <a href="About.php" >About</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
 <a href="test13.php"><?php if(isset($_SESSION['username'])){echo "Logout";}else{echo "";}?></a>

</div>
<!-- my footer for EEC
<div class="foot">
<p style="font-family: 'Hanalei Fill', cursive; font-size:15px;"> Designed with <i style="font-size:13px; color: red;" class="fa">&#xf004;</i> by <span style="font-size: 18px;"><u>EEC</u></span> </p>
</div>-->

<!-- my leaderboard -->
<div id="myleader" class="leader">

  <!-- Modal content -->
  <div class="leader-content">
    <div class="leader-header">
      <span class="close">&times;</span>
      <h1 style="font-family: Vast Shadow, cursive;font-size: 300%; color:#FDA543;text-align: center;">Leader Board</h1>
    </div>
    <div class="leader-body">
        
<table  style='table-dark'>
    <thead>    
    <tr>
        <td style="font-weight:bold";>Rank</td>
        <td style="font-weight:bold";>User</td>
        <td style="font-weight:bold";>Score</td>
        
    </tr>
    </thead>
   
<?php

session_start();

$sql="select username,score from player order by score desc";
$result=$conn->query($sql);
$rank=1;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
{
            if($_SESSION['username']!=$row['username'] || $rank<=10)
		 {
                   if($rank<=10)
			{			
			  echo "<tr><td>{$rank}</td>
				      <td>{$row['username']}</td>
				     <td>{$row['score']}</td>
				 </tr>";

				
			 }
		}
            else
   		{
		   $name=$row['username'];
		   $score=$row['score'];
		   $rank_=$rank;
                  
		}
              $rank++;
      if($name!=NULL AND $rank>10)
         break;
           
    } 
}
  echo "<tr style='font-weight:bold'><td>{$rank_}</td>
	    <td>{$name}</td>
	    <td>{$score}</td>
       </tr>";
?>

</table>

      <h3>Current Team:<?php echo $_SESSION['username']?></h3>
    </div>
  </div>

</div>



<script>

  //my navbar
function myFunction() {
    var x = document.getElementById("myNavbar");
    if (x.className === "navbar") {
        x.className += " responsive";
    } else {
        x.className = "navbar";
    }
}



jQuery(document).ready(function($){
  
  window.onload = function (){
    $(".bts-popup").delay(1000).addClass('is-visible');
	}
  
	//open popup
	$('.bts-popup-trigger').on('click', function(event){
		event.preventDefault();
		$('.bts-popup').addClass('is-visible');
	});
	
	//close popup
	$('.bts-popup').on('click', function(event){
		if( $(event.target).is('.bts-popup-close') || $(event.target).is('.bts-popup') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup when clicking the esc keyboard button
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		$('.bts-popup').removeClass('is-visible');
	    }
    });
});


</script>

</body>
</html>
