<?php
session_start();
if(!isset($_SESSION['username'])){
	header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
     <link rel="shortcut icon" href="https://version18.in/img/shortcut.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Galaxian-Editor</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/editor.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="lib/codemirror.css">
     <link rel="stylesheet" type="text/css" href="theme/neo.css">
       <link rel="stylesheet" type="text/css" href="theme/ambiance.css">
   <link rel="stylesheet" href="lib/codemirror.css">
<link rel="stylesheet" href="theme/3024-day.css">
<link rel="stylesheet" href="theme/3024-night.css">
<link rel="stylesheet" href="theme/ambiance.css">
<link rel="stylesheet" href="theme/base16-dark.css">
<link rel="stylesheet" href="theme/base16-light.css">
<link rel="stylesheet" href="theme/blackboard.css">
<link rel="stylesheet" href="theme/tomorrow-night-eighties.css">
<link rel="stylesheet" href="theme/elegant.css">
<style>
table {
    border-collapse: collapse;
    
    width: 100%;
}
a:hover { 
   // background-color: #d9d9d9;
    text-decoration:underline;
    color:#333333;
    
}
a{
 
 padding-left:3%;   
 color:  #808080; 
 font-size:1em;
//border-right:solid 1px #999999;
//border-bottom:solid 1px #999999;
//border-top:solid 1px #999999;
text-align:centre;
text-decoration:underline;
}

th, td {
    width:auto;
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
tr:hover {background-color: #f5f5f5;}
</style>

  </head>

  <body>

    
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h3>GALAXIAN</h3>
          <p>Code your heart out</p>
        </div>
      </div>
      <div class="row">

        <div class="col-lg-8" style="background-color:#f2f2f2;">
          <h1 class="mt-4" style="background-color:#bfbfbf; "><p style="margin-left:35%"><?php echo "LEVEL-".$_SESSION['level']; ?></p></h1>

          <hr>

          <p class="lead" >  
            <?php 
                   $dir=getcwd();
                   //echo $dir;
       //$filename = "$dir\hello.php";
       //$d=file_get_contents($filename);
                   chdir("questions");
                   chdir("level".$_SESSION['level']);
                   chdir("q".$_SESSION['ques']);
                   $con = file_get_contents("qus_".$_SESSION['ques'].".html");
                   echo $con;
                   chdir($dir);
                  //echo readfile("qus_1.html");
            ?></p>

          <hr>
          <div class="card my-6" style="">
            <h5 class="card-header">
              <select id="sel" onchange="select()" style="border:none;background-color: white;font-size: 15px;">
                <?php
                if($_SESSION['level']!=4){
              echo '<option value="clike">C Language</option>';
              echo '<option value="clike">C++</option>';
            }
            else
            {
              echo '<option value="clike">Parse</option>';
                }
                ?></select>
                 <select id="sel1" onchange="selectTheme()" style="border:none;background-color: white;font-size: 15px;float:right;">
                <option value="default" selected>default</option>
               <option value="3024-night">3024-night</option>
               <option value="ambiance">ambiance</option>
              <option value="base16-dark">base16-dark</option>
              <option value="base16-light">base16-light</option>
              <option value="blackboard">blackboard</option>
              <option value="elegant">elegant</option>
              <option value="tomorrow-night-eighties">tomorrow-night-eighties</option>
</select>
                
                </h5>
            
            <div class="card-body">
              <div id="codeeditor" name="codeeditor" style=""></div>

              </div>
              
              <h5 class="card-header">
                <button type="submit" class="btn btn-primary" onclick="se()">Compile</button>
                </h5>


          </div>
              <h5 class="card-header">
                       <div id="response" style="height:200px;background-color:black;color:white;overflow:auto;">//your code result</div>
                </h5>     
          <!-- Single Comment -->

          <!-- Comment with nested comments -->
         

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4" style="overflow:hidden;">
          <div class="card my-4" style="overflow:hidden;" >
          
           
         <!--  <h5 class="card-header" align="center" >
            <i class="material-icons" style="display:inline">person</i>  
                 <?php echo "User: ".$_SESSION['username']; ?>
          </h5>
          
          
          <h5 class="card-header" align="center" style="margin-bottom:2%" >
       <a href="Play.php" style="border-left:solid 1px #999999;">Home</a>
        <a href="Rules.php" >Rules</a>
    <a href="About.php" >About</a> 
    
 <a href="test13.php"><?php if(isset($_SESSION['username'])){echo "Logout";}else{echo "";}?></a>
          </h5> its a comment ....  -->
          
          
            <h5 class="card-header" align="center" >Leaderboard(<?php $lev="level-".$_SESSION['level']; echo $lev ?>)
 <a href="test13.php"><?php if(isset($_SESSION['username'])){echo "Logout";}else{echo "";}?></a></h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-25" style="">
                  <ul class="list-unstyled mb-0" style="font-size:15px;">
                   
                   
                                               
                    <table style="table-dark">
                        <thead>    
                        <tr>
                            <td style="font-weight:bold";>Rank</td>
                            <td style="font-weight:bold";>Name</td>
                            <td style="font-weight:bold";>Score</td>
                            
                        </tr>
                        </thead>
                       
                    <?php
                    
                    session_start();
                    require("dbcon1.php");
                    $lev="level".$_SESSION['level'];
                    $sql = "SELECT * FROM player ORDER BY $lev DESC";
                    
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
                    				      <td>{$row['name']}</td>
                    				     <td>{$row[$lev]}</td>
                    				 </tr>";
                    
                    				
                    			 }
                    		}
                                else
                       		{
                    		   $name=$row['name'];
                    		   $score=$row[$lev];
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

                         
                  </ul>
                </div>
                
              </div>
            </div>
          </div>

        </div>

      </div>


      <!-- /.row -->

    </div>

          
    <!-- /.container -->

    <!-- Footer -->
    <div class="row">
      <div class="col-12 p-2 text-center">
        Designed and developed by EEC
      </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="lib/codemirror.js"></script>
    <script type="text/javascript" src="js/default.js"></script>
    <script src="mode/javascript/javascript.js"></script>
    <script src="mode/python/python.js"></script>
    <script src="mode/clike/clike.js"></script>
    <script src="addon/hint/css-hint.js"></script>
    <script src="addon/hint/show-hint.js"></script>
    <link sheet="stylesheet" type="text/css" href="addon/hint/css-hint.css"/>


  </body>
<script type="text/javascript">
//alert(editor.getValue());
var temp;
  var editor= CodeMirror(document.getElementById("codeeditor"), {
mode: "javascript",
lineNumbers:true,
lineWrapping:true,
showCursorWhenSelecting : true});
editor.setSize(null, 500);
function select(){
  var code = $(".codemirror-textarea")[0];
  editor.setValue('');
  var x = document.getElementById("sel").selectedIndex;
  var temp =document.getElementsByTagName("option")[x].value;
  //alert(temp);
  editor.setOption('mode',temp);
  //alert("hello");
}

function se(){  
var index = document.getElementById("sel").selectedIndex;
  document.getElementById("response").innerHTML="Testing....";
 var x = document.getElementById("sel").selectedIndex;
  var temp =document.getElementsByTagName("option")[x].value;
//alert(temp);
  var input =  editor.getValue();
  var encode  = encodeURIComponent(input.toString());
  //var lang = document.getElementById("lang").value;
  var xml = new XMLHttpRequest();
  xml.onreadystatechange = function()
  {
    if(this.readyState == 4 && this.status == 200 )
    {
      document.getElementById("response").innerHTML= xml.responseText.trim();

      if( xml.responseText.indexOf("All testcases passed")!== -1 || xml.responseText.indexOf("already solved")!== -1 )
      {
            document.getElementById("response").innerHTML+=   "  <br>   Redirecting..."     
         setTimeout(fun, 5000);
         
         }
    }
  }
  xml.open("POST","demo.php?code="+encode+"&lang="+temp+"&index="+index,true);
  xml.send();


}
function fun(){
     window.location.href="Play.php";
}
function selectTheme() {
    //alert("change");
    var input = document.getElementById("sel1");
  var theme = input.options[input.selectedIndex].innerHTML;
    
    editor.setOption("theme", theme);
}

</script>
</html>
