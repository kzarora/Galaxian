<?php
session_start();
require("dbcon1.php");
if(!isset($_SESSION['error']) || empty($_SESSION['error'])) {
   //echo '<script>alert("Set and not empty, and no undefined index error!");</script>';
}
else{
//echo '<script> alert("set" );</script>';
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="required1.css">
 <link rel="shortcut icon" href="https://version18.in/img/shortcut.png"/>
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
    width: 100%;
    
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    font-family: 'Inconsolata', monospace;
}
tr:hover {background-color: #f5f5f5;}


/* Background image animation */
.hero-bkg-animated {
  background:url("bg.jpg");
  background-position: center;
  background-size: cover;
  height: auto;
  width: auto;
  margin: 0;
  text-align: center;
}

@-webkit-keyframes slide {
    from { background-position: 0 0; }
    to { background-position: -400px 0; }
}

/* Background Image close */


.navbar {
  overflow: hidden;
  background-color: #555;
  position: fixed;
  bottom: 30px;
  width: 100%;
  text-align: center;
  padding-left:35%;
  padding-right: 0%;
  font-family: Caveat Brush,sans-serif;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 10px 12px;
  text-decoration: none;
  font-size: 20px;
}

.navbar a:hover {
  background-color: #ddd;
  color: black;
}

.navbar a.active {
  background-color: #000;
  color: white;
}

.navbar .icon {
  display: none;
}
.foot{
  overflow: hidden;
  color:#cabbac ;
  position: fixed;
  bottom: -8px;
  width: 100%;
  text-align: center;
}

@media screen and (max-width: 675px) {
.navbar{
padding-left:0%;
}
  .navbar a:not(:first-child) {display: none;}
  .navbar a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 675px) {
  .navbar.responsive .icon {
    position: absolute;
    right: 0;
    bottom:0;
  }
  .navbar.responsive a {
    float: none;
    display: block;
    text-align: left;
  }

}
@media screen and (max-width: 250px) {
 .foot{
   visibility: hidden;
  display:none;
  }
  .navbar{
  bottom: 0px;
  }
}
  /*  My Rules Begin !!!  */

.rule{
    font-family: 'Cutive' ,serif;
    background-color: rgba(155, 100, 100, 0.5);
    padding: 3%;
    font-size: 25px;
    margin:0 auto;
    margin-bottom: 100px;
    color: white; 
    border: 5px solid #00FFFF;
    border-radius: 25px;
    width: 80%;
}
  
  /*  My Rules End !!!  */  
</style>
</head>
<body oncontextmenu="return false;" class="hero-bkg-animated">
<h1 style="font-family: Vast Shadow, cursive;font-size: 300%;color:#00FFFF;text-align: center;">What is GalaXian</h1>

<div class="rule">
  
<p>
   'Gal-Axian', as name says, there is a galaxy that has many planets. Participants will have to discover the keys at these planets. One planet may have zero, one or more than one keys. Each key is associated to one or more than one coding problems. First, participant needs to find keys and then code the corresponding problems. <br><br><br>Stay tuned for more updates !!
</p>

</div>


<!-- loader in center -->
<div class="loader-box"></div>



<!-- my navigation bar at bottom -->
<div class="navbar" id="myNavbar">
   <a href="About.php" class="active">About</a>
   <a href="Play.php">Play</a>
   <a href="leaderboard.php">Leader Board</a>
   <a href="Rules.php" >Rules</a>
   <a href="contactus.php">Contact Us</a>
   <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
   <a href="test13.php"><?php if(isset($_SESSION['username'])){echo "Logout";}else{echo "";}?></a>

</div>
<div class="foot">
<p style="font-family: 'Hanalei Fill', cursive; font-size:15px;"> Designed with <i style="font-size:13px; color: red;" class="fa">&#xf004;</i> by EEC</p>
</div>

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

    </div>
    <div class="leader-footer">
      <h3>Current Team</h3>
    </div>
  </div>

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

// My leader bord
// Get the modal
var modal = document.getElementById('myleader');

// Get the button that opens the modal
var btn = document.getElementById("myleadBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


</script>

</body>
</html>
