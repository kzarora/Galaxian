
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADA-CODE_ARENA</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/level_6.css" rel="stylesheet">
    
<style> 
 .relative
      .thumbnail {
    position: relative;
}



.caption {
    position: absolute;
    top: 35%;
    left: 20%;
    width: 100%;
}
} 
    </style>
    
    


  </head>

  <body>
  <?php
 
   session_start();
   if($_SERVER["REQUEST_METHOD"]=="POST"){
   echo 'hello';
   
   }
 
?>
    <!-- Navigation -->
   

    <!-- Header with Background Image -->
    <header class="business-header">
    <img class="" src="img/1.jpg" width="100%" height="100%"/>
      <div class="container">
        <div class="row">

          <div class="col-lg-12">

            <h1 class="display-3 text-center text-white mt-4"></h1>
          </div>
        </div>
      </div>
    </header>
<nav class="navbar navbar-expand-md navbar-dark bg-dark ">
      <div class="container">
        <a class="navbar-brand" href="#" (current)>Details</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
             <form method="POST" name="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  onsubmit = "return check()">
             <!-- <form method="POST" name="login" action="timer.php"> -->
              <a class="nav-link" href=""><button class="btn btn-info navbar-btn" style="height:50%" name="login">JOIN</button></a></form>
                <span class="sr-only"></span>    
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <br/>
    <!-- Page Content -->
    <div class="container" >

      <div class="row">
        <div class="col-sm-5" style="background-color:#f2f2f2;">
          <h2 class="mt-4">How does It Works?</h2>
          <p>When entering the Clash of Code arena, you are sent to the Clash lobby, where you wait for other players to join you in the game.
Once enough players have joined (at least two people), the Clash starts.</p>
<p>
To speed up the process, you can also invite CodinGamers you follow or friends to join your Clash by sharing its link.
To win the Clash, you need to pass all test cases in the given time.</p>
          </p>
        </div>

        <div  class="col-sm-5" style="margin-left:15%;background-color: #f2f2f2;">
         
          
         
                
               <img style="opacity: 0.6; filter: alpha(opacity=40);position:relative" class="img-responsive" src="img/2.jpg" height="100%" width="100%"/>
                <div class="caption">
              <p id="demo"style="font-size:45px;color:white;"></p>
            
           </div>
        </div>
      </div>
      <!-- /.row -->
    
    </div>
    <!-- /.container -->
    <br/>
    <!-- Footer -->
    <footer class="py-3 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
<script>
var flag1=false;
// Set the date we're counting down to
var countDownDate = new Date("aug 22, 2018 12:37:25").getTime();//set this time when you want to start test
//document.write(countDownDate);
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
    document.getElementById("demo").innerHTML =  hours + "h: "
    + minutes + "m: " + seconds + "s ";
}
    
    // If the count down is over, write some text 
    if (distance < 0) {
      
        flag1=true;
      // window.location.href = "refer.php?name=" + javascriptVariable; 
       //Fun();
        clearInterval(x);
        document.getElementById("demo").innerHTML = "Contest is started";
    }
}, 1000);

function check(){
if(flag1==true)
return flag1;
else
{
  alert('contest is not started yet');
  return flag1;
}
    }
</script>

</html>
