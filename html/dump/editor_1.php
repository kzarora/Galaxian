<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADA-Editor</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/editor.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="lib/codemirror.css">

  </head>

  <body>


    <div class="container">

      <div class="row">

        <div class="col-lg-8">
          <h1 class="mt-4"><?php echo "LEVEL-".$_SESSION['level']; ?></h1>

          <hr>

          <p class="lead">
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
          <div class="card my-4">
            <h5 class="card-header">
              <select id="sel" onchange="select()" style="border:none;background-color: white;font-size: 15px;">
                <?php
                if($_SESSION['curr_level']!=4){
              echo '<option value="clike">C Language</option>';
              echo '<option value="clike">C++</option>';
            }
            else
            {
              echo '<option value="clike">Parse</option>';
                }
                ?></select></h5>
            
            <div class="card-body">
              <div id="codeeditor" name="codeeditor"></div>

              </div>
              <h5 class="card-header">
                <button type="submit" class="btn btn-primary" onclick="se()">Compile</button>
                </h5>


          </div>
              <h5 class="card-header">
                <div id="response" style="height:300px;background-color:black;color:white;overflow:auto;">//your code output</div>
                </h5>     
          <!-- Single Comment -->

          <!-- Comment with nested comments -->
         

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
          <div class="card my-4">
            <h5 class="card-header" align="center">Leader Board</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-15">
                  <ul class="list-unstyled mb-0" style="font-size:15px;">
                   <?php
                   require("dbcon1.php");
                   $lev="level".$_SESSION['level'];
                    $sql = "SELECT username FROM player ORDER BY $lev DESC";
                    if($conn->query($sql)==FALSE){
                      die($conn->error);
                    }
                       $result= $conn->query($sql);
          
                    if($result->num_rows>0){
                      while($row=$result->fetch_assoc()){
                           echo '<li>'. $row['username'].'</li>';
                           echo '<hr>';
                      }
                    }
                   ?>       
                  </ul>
                </div>
                 <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                   <?php
                   require("dbcon1.php");
                   $lev="level".$_SESSION['level'];
                    $sql = "SELECT $lev FROM player ORDER BY $lev DESC";
                    if($conn->query($sql)==FALSE){
                      die($conn->error);
                    }
                       $result= $conn->query($sql);
          
                    if($result->num_rows>0){
                      while($row=$result->fetch_assoc()){
                           echo '<li>'. $row[$lev].'</li>';
                           echo '<hr>';
                      }
                    }
                   ?>       
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
      document.getElementById("response").innerHTML= xml.responseText;
    }
  }
  xml.open("POST","demo.php?code="+encode+"&lang="+temp,true);
  xml.send();


}

</script>
</html>
