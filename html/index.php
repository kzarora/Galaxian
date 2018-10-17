
<!DOCTYPE html>
<html>
<head>
<!--<meta http-equiv="refresh" content="15"> -->
 <link rel="shortcut icon" href="https://version18.in/img/shortcut.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="required1.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Hanalei+Fill" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Caveat+Brush" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Wallpoet" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Vast+Shadow" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cutive" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<meta name ="google-signin-client_id" content ="481364252346-fkicc14vj7qtcgv7m33km2n3n64up13m.apps.googleusercontent.com">
<title>Galaxian</title>
<style>




</style>

<script>
  window.console = window.console || function(t) {};
</script>
<script>
  window.console = window.console || function(t) {};
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>

</head>
<!--oncontextmenu="return false;"-->
<body oncontextmenu="return false;" style="text-align: center;">

<!-- my galaxian logo -->
<img src="g3.png" style="width: 50%;height: 20%;padding-top: 1%;">

<!-- loader in center -->


<div class="view">
  <div class="plane main">
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
  </div>
</div>




<!-- My buttons  -->

<div style="padding-top: 180px;z-index: 10000;"> 
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
  <a href="https://drive.google.com/file/d/17NfX21U5nd4rvlMvFJZPU1b3C_WTDctY/view" target="_blank"><button class="button log_buts" style="font-size:15px;">Click here to download the game</button></a>
  <br/><br/>
  <marquee style="color:#00FFFF;font-size:20px;">The game will close by 11:59 PM today. </marquee>
</div>
<div>
<button class="button reg_but">Please open in Desktop</button>
</div>

<!-- my navigation bar at bottom -->
<div class="navbar" id="myNavbar">
  <a href="Play.php" class="active">Play</a>
  <a href="leaderboard.php">Leader Board</a>
  <a href="Rules.php">Rules</a>
  <a href="About.php">About</a>
  <a href="contactus.php">Contact Us</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  <a href="test13.php"><?php if(isset($_SESSION['username'])){echo "Logout";}else{echo "";}?></a>

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
