<?php
session_start();
//require("dbcon1.php");
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
body {
  background:url("bg.jpg");
  background-position: center;
  background-size: cover;
}

  
  /*  My Rules End !!!  */  
</style>
</head>
<body oncontextmenu="return false;" class="hero-bkg-animated">
<h1 style="font-family: Vast Shadow, cursive;font-size: 300%;color:#00FFFF;text-align: center;">Contact Us</h1>

<div class="rule">
  

<table style="width:80%" align="center">
  <tr>
    <td>Kshitiz Arora</td>
    <td>9791501849</td> 
  </tr>
  <tr>
    <td>Udit Vyas</td>
    <td>9981122335</td>
  </tr>
</table>
</div>


<!-- loader in center -->
<div class="loader-box"></div>



<!-- my navigation bar at bottom -->
<div class="navbar" id="myNavbar">
  <a href="contactus.php" class="active">Contact Us</a>
  <a href="Play.php">Play</a>
  <a id="" href="leaderboard.php">Leader Board</a>
  <a href="Rules.php" >Rules</a>
  <a href="About.php">About</a>
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
