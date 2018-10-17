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
 <link rel="shortcut icon" href="https://version18.in/img/shortcut.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="required.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Hanalei+Fill" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Caveat+Brush" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Vast+Shadow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Yatra+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
<title>Galaxian</title>

<style>
body {
  background:url("bg.jpg");
  background-position: center;
  background-size: cover;
}
.accordionn {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
    font-family: 'Yatra One', cursive;
    border-radius: 10px;
    margin: 2px;
    overflow:hidden;
}

.active, .accordionn:hover {
    background-color: #ccc;
}

.panell {
    padding: 0 18px;
    background-color: none;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
    color: white;
}


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
    font-family: 'Inconsolata', monospace;
    background-color: rgba(155, 100, 100, 0.5);
    padding: 1%;
    font-size: 25px;
    margin:0 auto;
    margin-bottom: 100px;
    color: white; 
    border: 5px solid #00FFFF;
    border-radius: 25px;
    width: 80%;
    text-alignment:center;
}
 ul
 {
  text-align: left;
 } 
 li{
  margin: 10px;
 }
 
 table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}

 
  /*  My Rules End !!!  */  
</style>
</head>
<body oncontextmenu="return false;" style="text-align: center;">
<h1 style="font-family: Vast Shadow, cursive;font-size: 300%;color:#00FFFF;text-align: center;">Rules</h1>
<div class="rule">
<p>
  Rules are made to follow.<br><br> More you abide to the rules and regulations more you get the success !! <br><br> Happy Journey :)<br><br> 
    
<ul>
  <li>To play the game you need to download zip file. To download the zip file of the game <a href="https://drive.google.com/file/d/17NfX21U5nd4rvlMvFJZPU1b3C_WTDctY/view" target="_blank" style="text-decoration:none"><span style="color:#00FFFF"> click here</span></a>.</li>
  <li style="font-size: 30px;"><b>Only MCA students are eligible for prizes.Participants college ID card will be required for the verification.</b></li>
  <li>Everyday at 12:00 am a new level will open starting from 1st level on 23rd August to 5th level on 27th August</li> 
  <li>You will be given a 3d map to traverse.</li>
  <li>User can traverse anywhere in the universe.</li>
  <li> Do not go near Sun as it may crash the game.</li>
  <li>It is an adventure game with 5 levels. The complexity of the game increases as you progress through levels.</li>
  <li>When you play the game you will find passkey of a particular question of particular level and then you have to submit that passkey into official GALAXIAN website. 
  <br> By entering the passkey on the official GALAXIAN website, a question appears and for each correct submission, leaderboard gets updated.</li>
  <li>The live leaderboard is only for Informal process and should be cited as the final reference.</li> 
  <li>Once the correct code submitted no further response of that question will be accepted. </li>
  <li>The C/C++ code should be compatible with gcc-4.8.4+ and g++-4.8.4+</li>
  <li>Other important information will be provided alongside proceeding game.</li>
  <li>All the inputs are in stdin and all the outputs are in stdout.</li>
  <li>Your system should atleast have 1GB of RAM for this game.</li>
  <li>The game can be played only on Windows Operating System.</li>
  <li>Please enter valid gmail ID. We will be able to contact you only using them.</li>
  <li>Valid gmail ID should be same for the game and for the official GALAXIAN website.</li>
  <li>In case of any unfair activity, your account will be blocked.</li>
  <li>Participants are advised not to play the game in multiple windows.</li>
  <li>In case of data forgery, the participant can be disqualified for participation and the decision of the Organising Committee, Version18 will be final and abiding.</li>
</ul>
</p>




<button class="accordionn">Level 4: ShubhUdi Technique (Ultimate Coding).</button>
<div class="panell">
  <ul>
  <li><a href="https://drive.google.com/open?id=1_6YVOC4IrwnBWtjLlcCi4qSe3ou5hTyF" target="_blank" style="text-decoration:none"><span style="color:#00FFFF">Click Here</span></a> to check the rules for Level 4.</li>
</ul>
</div>

<button class="accordionn">Level 3: Cut-to-Cut Geeks (Economical coding).</button>
<div class="panell">
  <ul >
  <li>This level contains straight forward coding questions.</li>
  <li>On each successful submission, the points will be awarded using the following formula:<br><span style="font-size:30px;color:#00FFFF;">100-((total sum of weightage of the keywords used)/1000 + remaining characters/200)</span>.</li>
  <li><p>Weightage for the keyword used:</p>
  <p>
  <table style="width:100%">
  <tr>
    <th>Keyword</th>
    <th>Weight</th> 
  </tr>
  <tr>
    <td>for</td>
    <td>4000</td>
  </tr>
  <tr>
    <td>while</td>
    <td>2000</td>
  </tr>
  <tr>
    <td>if</td>
    <td>1000</td>
  </tr>
  <tr>
    <td>string</td>
    <td>800</td>
  </tr>

  <tr>
    <td>switch</td>
    <td>500</td>
  </tr>
  <tr>
    <td>else</td>
    <td>400</td>
  </tr>
  <tr>
    <td>double</td>
    <td>300</td>
  </tr>
  <tr>
    <td>float, char</td>
    <td>200</td>
  </tr>
  <tr>
    <td>int</td>
    <td>100</td>
  </tr>

</table>

</p>
</li>
</ul>
</div>

<button class="accordionn">Level 2: Bargain Byte (Efficient coding).</button>
<div class="panell">
  <ul >
  <li>This level contains straight forward coding questions.</li>
  <li>Less the number of words, more the points awarded.</li>
  <li>On each successful submission, the points will be awarded using the following formula:<br><span style="font-size:30px;color:#00FFFF;">100-(total word count/5)</span>.</li>
</ul>
</div>


<button class="accordionn">Level 1: CrunchBox (Normal coding).</button>
<div class="panell">
  <ul>
  <li>This level contains straight forward coding questions.</li>
  <li>On each successful submission, 100 points will be awarded.</li>
</ul>
</div>


</div>


<!-- my navigation bar at bottom -->
<div class="navbar" id="myNavbar">
  <a href="Rules.php" class="active">Rules</a>
  <a href="Play.php">Play</a>
  <a href="leaderboard.php">Leader Board</a>
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


var acc = document.getElementsByClassName("accordionn");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panell = this.nextElementSibling;
    if (panell.style.maxHeight){
      panell.style.maxHeight = null;
    } else {
      panell.style.maxHeight = panell.scrollHeight + "px";
    }
    panell.style.overflow="scroll"; 
  });
}

</script>
</body>
</html>

