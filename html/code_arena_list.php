<?php
session_start();
require_once('dbcon1.php');
if( !isset($_SESSION['username']) ){
   header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.all{
position:relative;

left:13%;

}
.tab1{
    width:70%;
    height:90px;
    background-color:#ffffff;
    box-shadow:1px 1px 4px grey;
    padding:15px;
    margin: 1px 1px;
    border:3px solid none;
    border-radius: 0.2px ;
    overflow: hidden;
    text-overflow: ellipsis;
}
.q_tag{
  width:70%;
  float:left;
  margin-top: 20px;
    overflow: hidden;
    text-overflow: ellipsis;
}
.status_button{
width:15%;
float:right;
background-color:transparent;
border-bottom: 2px solid grey;
border-left: 2px solid grey;
border-radius: 4px;
text-align: center;
overflow: hidden;
text-overflow: ellipsis;
margin-top: 20px;
}
.status_button:hover, .tab1:hover{
  background-color:#F8F8FF;
    color:black;
    overflow: hidden;
    text-overflow: ellipsis;
}
.status_button:hover{
    cursor:pointer;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
</head>
<body style="background-color:#0d1a26">








<div style="position:fixed;left:40%;top:1%;font-size:2em;background-color:#a3c2c2;border-radius:3px;height:3em;width:8.3em;text-align:centre;border-style: ridge;">	
		<div style="margin-top:0.7em;margin-left:1.3em;"> 
				<div style="background-color:white;width:1.8em;display:inline-block;border-style: ridge;text-align:centre;">
				<span id="demo1" style="padding:0.5em;margin-top:3em;text-align:centre;margin-right:1em"></span>
				</div>

				<div style="background-color:white;width:1.8em;display:inline-block;border-style: ridge;">
				<span id="demo2" style="padding:0.5em;margin-top:3em;text-align:centre"></span>
				</div>

				<div style="background-color:white;width:1.8em;display:inline-block;border-style: ridge;">
				<span id="demo3" style="padding:0.5em;margin-top:3em;text-align:centre"></span>
				</div>

		</div>
	<!--	<div style="margin-top:0.5em;position:absolute;top:1.35em;left:1.32em">
				<div style="width:1.3em;display:inline-block;">
				<span style="">hrs</span>
				</div>

				<div style="width:1.3em;display:inline-block;">
				<span id="" style="">min </span>
				</div>

				<div style="width:1.8em;display:inline-block;">
				<span id="" style="margin-left:0.3em">secs</span>
				</div>

		</div>
	-->
</div>

<div class="all" style="margin-top:8%;">
    <div class="tab1" style="margin-top:7em;">
      <p class="q_tag col-sum-8">Question_A </p>
      
      <?php
        $username=$_SESSION['username'];
           $sql = "SELECT * FROM level5 WHERE username ='$username'";
    	 if($conn->query($sql)==FALSE)
	     die($conn->error);
	     $result=$conn->query($sql);
	     if($result->num_rows>0){
         $row = $result->fetch_assoc(); 
          }
          
           $sql2 = "SELECT * FROM `$username` WHERE level_no =5"; 
	if($conn->query($sql2)==FALSE)
	    die($conn->error);
	$result2=$conn->query($sql2);
	if($result2->num_rows>0){
         $row2 = $result2->fetch_assoc();
         } 

	if($row['q1']==1)
 {
    
	  echo "<form action='Play.php'  method='POST' style='display:inline-block;width:5em;margin-left:20%;' > 
     <input type='hidden' name='passkey1' value='gIxw01lffl10_5_1' >    
<button class='status_button col-sum-3' name='submit' style='margin-left:100%;width:8em'>solved</button>  
     </form>";
     }
	else
 {
		 echo "<form action='Play.php'  method='POST' style='display:inline-block;width:5em;margin-left:20%;' > 
     <input type='hidden' name='passkey1' value='gIxw01lffl10_5_1' >    
<button class='status_button col-sum-3' name='submit' style='margin-left:100%;width:8em'>solve</button>  
     </form>";
     }
		//return $row[$q];   

     
      ?>
	  
    </div>

    <div class="tab1">
    
    
      <p class="q_tag col-sum-8">Question_B </p>
      <?php
      if($row['q2']==1)
         {
    
	  echo "<form action='Play.php'  method='POST' style='display:inline-block;width:5em;margin-left:20%;' > 
     <input type='hidden' name='passkey1' value='v11v08dcXoOZ_5_2' >    
<button class='status_button col-sum-3' name='submit' style='margin-left:100%;width:8em'>solved</button>  
     </form>";
     }
	else
 {
		 echo "<form action='Play.php'  method='POST' style='display:inline-block;width:5em;margin-left:20%;' > 
     <input type='hidden' name='passkey1' value='v11v08dcXoOZ_5_2' >    
<button class='status_button col-sum-3' name='submit' style='margin-left:100%;width:8em'>solve now</button>  
     </form>";
     }
      ?>
    </div>

    <div class="tab1">
      <p class="q_tag col-sum-8">Question_C </p>
          <?php
          if($row['q3']==1)
             {
    
	  echo "<form action='Play.php'  method='POST' style='display:inline-block;width:5em;margin-left:20%;' > 
     <input type='hidden' name='passkey1' value='B591qSuU8tdg_5_3' >    
<button class='status_button col-sum-3' name='submit' style='margin-left:100%;width:8em'>solved</button>  
     </form>";
     }
	else
 {
		 echo "<form action='Play.php'  method='POST' style='display:inline-block;width:5em;margin-left:20%;' > 
     <input type='hidden' name='passkey1' value='B591qSuU8tdg_5_3' >    
<button class='status_button col-sum-3' name='submit' style='margin-left:100%;width:8em'>solve now</button>  
     </form>";
     }
          ?>
    </div>

    <div class="tab1">
      <p class="q_tag col-sum-8">Question_D </p>
             <?php
            if($row['q4']==1)
               {
    
	  echo "<form action='Play.php'  method='POST' style='display:inline-block;width:5em;margin-left:20%;' > 
     <input type='hidden' name='passkey1' value='F7WeILBbSOAd_5_4' >    
<button class='status_button col-sum-3' name='submit' style='margin-left:100%;width:8em'>solved</button>  
     </form>";
     }
	else
 {
		 echo "<form action='Play.php'  method='POST' style='display:inline-block;width:5em;margin-left:20%;' > 
     <input type='hidden' name='passkey1' value='F7WeILBbSOAd_5_4' >    
<button class='status_button col-sum-3' name='submit' style='margin-left:100%;width:8em'>solve now</button>  
     </form>";
     }
            ?>
    </div>

    <div class="tab1">
      <p class="q_tag col-sum-8">Question_E </p>
           <?php
          if($row['q5']==1)
            {
    
	  echo "<form action='Play.php'  method='POST' style='display:inline-block;width:5em;margin-left:20%;' > 
     <input type='hidden' name='passkey1' value='m4ErL56zAH21_5_5' >    
<button class='status_button col-sum-3' name='submit' style='margin-left:100%;width:8em'>solved</button>  
     </form>";
     }
	else
 {
		 echo "<form action='Play.php'  method='POST' style='display:inline-block;width:5em;margin-left:20%;' > 
     <input type='hidden' name='passkey1' value='m4ErL56zAH21_5_5' >    
<button class='status_button col-sum-3' name='submit' style='margin-left:100%;width:8em'>solve now</button>  
     </form>";
     }
          ?>
    </div>
</div>
</body>


<script>
// Set the date we're counting down to
var countDownDate = new Date("aug 22, 2018 15:37:25").getTime();//set this time when you want to start test

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
 

    // Output the result in an element with id="demo"
    var flag=1;//when you want to start timer update it flag=1;
    if(flag==1)
{
    document.getElementById("demo1").innerHTML =  hours + "       ";
	document.getElementById("demo2").innerHTML =  minutes + "               ";
	document.getElementById("demo3").innerHTML =  seconds + "        ";
}
    
    // If the count down is over, write some text 
    if (distance < 0) {
         function Fun() { 
        var javascriptVariable = "John";
       window.location.href = "refer.php?name=" + javascriptVariable; 
       }
       Fun();
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>


</html>
