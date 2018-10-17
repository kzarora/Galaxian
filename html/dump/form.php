<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Theme Template for Bootstrap</title>

   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
      body
       {
        margin-top: 10px;
       
          }
    </style>
<link rel="stylesheet" type="text/css" href="stylo.css">  <!-- css included -->
  </head>

  <body>
    <div class="bg">
	</div>
   
   
    <div class="container">
<div class="row">
  <div class="col-md-12 col-xs-12 col-lg-12">
  	<div class="header">
	 
         
        </div>
 </div>
</div>  

  <nav class="navbar navbar-default">
  <div class="container-fluid">
    
  </div>
</nav>
 
    <div class="row">
  <div class="col-md-12 col-xs-12 col-lg-12">
    <form action="check_login.php"  method="POST" class="form"> 
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="email" class="form-control" id="email" name="username" style="width:50%">
  </div>
  <div class="form-group column">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pass" style="width:50%">
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
   <br><br><a href="user_reg.php" style="margin-left:20%; color:white; text-decoration:none" class="hoverOnButton">dont have an account? Register here</a>

			   <?php
            if(isset($_SESSION["message"])&&!empty($_SESSION["message"]))
                  {
                   echo '<script language="javascript">';
				   $error=$_SESSION["message"];
				   echo 'alert("invalid login ")';
				   echo '</script>';
                  unset($_SESSION["message"]);
                  }
          ?>

</form>
      
    
           

     
  </div>
  
</div>  


      
      

     


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    
  </body>
</html>