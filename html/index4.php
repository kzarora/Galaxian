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
<!--<meta http-equiv="refresh" content="15"> -->
<meta name ="google-signin-client_id" content ="481364252346-fkicc14vj7qtcgv7m33km2n3n64up13m.apps.googleusercontent.com">
<link rel="stylesheet" type="text/css" href="required.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Hanalei+Fill" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Caveat+Brush" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Wallpoet" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Vast+Shadow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cutive" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
    cursor: pointer;
    z-index: 2;
    color: #CBFF6B; 
    border: 5px solid #CBFF6B;
    border-radius: 25px;
    margin: 4px;
    opacity: 0.75;
    border-left: 5px solid #000 ;
    border-right: 5px solid #000 ;
}
.g-signin2{
  margin-left:45%;
}
.log_but{
  color: #CBFF6B;
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
  background:url("background (3).jpg") repeat 0 0;
  background-position: center;
  background-size: cover;
  height: auto;
  width: auto;
  margin: 0;
  text-align: center;
  -webkit-animation: slide 10s linear infinite;
}

@-webkit-keyframes slide {
    from { background-position: 0 0; }
    to { background-position: -600px 0; }
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

}
@media screen and (max-width: 675px){
.pasky{
  visibility: hidden;
}
}

</style>
</head>
<!--oncontextmenu="return false;"-->
<body oncontextmenu="return false;" class="hero-bkg-animated" style="text-align: center;">

<!-- my galaxian logo -->
<svg viewBox="0 0 960 300">
  <symbol id="s-text">
    <text text-anchor="middle" x="50%" y="80%">GalaXian</text>
  </symbol>

  <g class = "g-ants">
    <use xlink:href="#s-text" class="text-copy"></use>
    <use xlink:href="#s-text" class="text-copy"></use>
    <use xlink:href="#s-text" class="text-copy"></use>
    <use xlink:href="#s-text" class="text-copy"></use>
    <use xlink:href="#s-text" class="text-copy"></use>
  </g>
</svg>


<!-- loader in center -->
<div class="loader-box">
      <div class="loader">
            <div class="element-animation">
            <img src="centre_icons.png" width="480" height="100";>
            </div>
      </div>
      <ul class="labels">
        <li class="label">"Explore"</li>
        <li class="label">Crack..</li>
        <li class="label">Code..</li>
        <li class="label">Lead!!</li>
      </ul>
    <br>
    <div style="padding-top: 40px;">
      <div class="g-signin2" data-onsuccess="onSuccess" data-theme="dark">
      <script src="https://apis.google.com/js/platform.js" async defer></script>
    </div>
    <div>
      <script>
    function onSuccess(googleUser) {
    var profile = googleUser.getBasicProfile();
    var id = profile.getId();
  var name=profile.getName();
  var email= profile.getEmail();
  var image=profile.getImageUrl();
      console.log(email);
        var auth2 = gapi.auth2.getAuthInstance();
          auth2.disconnect();
         var xml = new XMLHttpRequest();
          xml.onreadystatechange = function()
    {
    if(this.readyState == 4 && this.status == 200 )
    {
      //document.getElementById("response").innerHTML= xml.responseText;
    }
  }
  $.ajax({
    url: "demo1.php",
    data:{
      'id':id,
      'name':name,
      'email':email,
      'img':image
    },
    success: function(result){
      console.log("success");
      window.location.href ="check_login1.php";
    },
    error: function(){
      console.log("error");
    }
  });
  //xml.open("POST","demo1.php?id="+id+"&name="+name+"&email="+email+"&img="+image,true);
  //xml.open("POST","demo1.php?email="+email,true);
  //xml.send();  
    //window.location.href ="check_login1.php";
    }
   function signOut() {
   // alert('hello');
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
     alert('hello1');
    });
    }
  </script>
  
  

      
      
        <button onclick="" class="button reg_but">Please open in Desktop</button>
      </div>
    </div>
</div>


 
<!-- my navigation bar at bottom -->
<div class="navbar" id="myNavbar">
  <a href="Play.php" class="active">Play</a>
  <a id="myleadBtn" href="#">Leader Board</a>
  <a href="Rules.php">Rules</a>
  <a href="About.php">About</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  <a href="test13.php"><?php if(isset($_SESSION['username'])){echo "Logout";}else{echo "";}?></a>

</div>
<!-- my footer for EEC -->
<div class="foot">
<p style="font-family: 'Hanalei Fill', cursive; font-size:15px;"> Designed with <i style="font-size:13px; color: red;" class="fa">&#xf004;</i> by <span style="font-size: 18px;"><u>EEC</u></span> </p>
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
            if($_SESSION['username']!=$row['username'])
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

  //my navbar
function myFunction() {
    var x = document.getElementById("myNavbar");
    if (x.className === "navbar") {
        x.className += " responsive";
    } else {
        x.className = "navbar";
    }
}




// MY logo GalaXian





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
