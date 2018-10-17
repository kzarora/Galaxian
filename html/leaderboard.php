<?php
session_start();
require_once('dbcon1.php');
if( !isset($_SESSION['username']) ){
  // header("location:index.php");
}
?> 

<!DOCTYPE html>
<html>
<head>
 <link rel="shortcut icon" href="https://version18.in/img/shortcut.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="required.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Hanalei+Fill" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Caveat+Brush" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Vast+Shadow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Vast+Shadow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
<title>Galaxian</title>
<style>

table {
    border-collapse: collapse;
    width: 75%;
    height:50%;
    margin-left:14%;
    background-color:#060d13;
    padding:10px;
    margin-bottom:8%;
    overflow:auto;
    font-family: 'Inconsolata', monospace;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 0.03px solid #ddd;
       
    color:white;
}
tr:hover {background-color:#0d1a26; 
}



.navbar {
  bottom: 30px;
}

body{
  background:url("bg.jpg");
  background-position: center;
  background-size: cover;  
}

</style>
</head>
<body oncontextmenu="return false;" style="text-align: center;">
<h1 style="font-family: Vast Shadow, cursive;font-size: 300%;color:#00FFFF;text-align: center;">Leader Board</h1>


              
<table  style=''>
    <thead>    
    <tr>
        <td style="font-weight:bold";>Rank</td>
        <td style="font-weight:bold";>Name</td>
        
        <td style="font-weight:bold";>Score</td>
        
    </tr>
    </thead>
   
<?php

session_start();

$sql="select * from player order by score desc,curr_time";
$result=$conn->query($sql);
$rank=1;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
{
            if($_SESSION['username']!=$row['username'] || $rank<=50)
		 {
                   if($rank<=50)
			{			
			  
        echo "<tr><td>{$rank}</td>
                <td>{$row['name']}</td>
				     <td>{$row['score']}</td> 
				 </tr>";

				
			 }
		}
            else
   		{
		   $username=$row['username'];
		   $score=$row['score'];
		   $rank_=$rank;
       $name=$row['name'];;
                  
		}
              $rank++;
      if($name!=NULL AND $rank>50)
         break;
           
    } 
}
 if($name!=  NULL)
  echo "<tr style='font-weight:bold'><td>{$rank_}</td>
	    <td>{$name}</td>
	    <td>{$score}</td>
       </tr>";
?>

</table>




<!-- my navigation bar at bottom -->
<div class="navbar" id="myNavbar">
 <a href="leaderboard.php" class="active" >Leader Board</a>
 <a href="Play.php">Play</a>
  <a href="Rules.php">Rules</a>
  <a href="About.php">About</a>
  <a href="contactus.php">Contact Us</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  <a href="test13.php"><?php if(isset($_SESSION['username'])){echo "Logout";}else{echo "";}?></a>

</div>
<div class="foot">
<p style="font-family: 'Hanalei Fill', cursive; font-size:15px;"> Designed with <i style="font-size:13px; color: red;" class="fa">&#xf004;</i> by EEC</p>
</div>



<script>
function myFunction() {
    var x = document.getElementById("myNavbar");
    if (x.className === "navbar") {
        x.className += " responsive";
    } else {
        x.className = "navbar";
    }
}


</script>

</body>
</html>
