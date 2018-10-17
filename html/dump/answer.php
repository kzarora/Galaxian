<?php
require("dbcon1.php");
  session_start();
  if(!isset($_SESSION['username']) || !isset($_SESSION['level']) || !isset($_SESSION['ques'])){
  	echo "not set";
	exit();
}


  class answer {
    var $userid ;
	var $level;
	var $qus_no ;
	var $folderPath ; 
	var $exec;
	var $source_code;
	var $outputFile ;
	var $stdErrFile ;
	var $inputFile ;
	var $code = '';	
	var $answerFile;
	var $testCases;
	
       function __construct($Code,$mode)
	{
		//echo $_SESSION['username'];
	$this->userid = $_SESSION['username'];
	$this->level = $_SESSION['level'];
	$this->qus_no = $_SESSION['ques'];
	$this->folderPath = "users/".$this->userid."/questions/level".$this->level."/q".$this->qus_no; 
	$this->exec = $this->folderPath."/q".$this->qus_no;
	$this->source_code = $this->exec.$mode;
	$this->outputFile = $this->folderPath."/output.txt";
	$this->stdErrFile = $this->folderPath."/error.txt";
	$this->inputFile = "questions/level".$this->level."/q".$this->qus_no."/input.txt";
	$this->answerFile = "questions/level".$this->level."/q".$this->qus_no."/output.txt";
	$this->code = $Code;
	//$this->testCases = intval($_SESSION['test_cases']);
	}

	function getAnswer()
	{
			//$this->makeUserFolder();

		 if($this->check_ques()){
			$this->createFiles();
			return $this->fun();
		}
		else{
			$str="already solved";
			return $str;
			//return $this->executeCommand();
		}
	}
	function createFiles()
	{

    file_put_contents($this->source_code, $this->code);
	file_put_contents($this->outputFile, ' ');
	file_put_contents($this->stdErrFile, ' ');
	
	}
	

	function fun(){
		if($_SESSION['level']==4){
			$CC="gcc";

		}
		else
		{
		$CC="g++";	
		}
	$out=" a.out ";
	//$code=$_POST["code"];
	$filename_arr=explode("/",$this->source_code);
	//echo "<br>".$this->source_code;
	$filename_code = $filename_arr[5];
	$code_output=file_get_contents($this->answerFile);
    $filename_in=file_get_contents($this->inputFile); 
    $input_path =  getcwd()."/".$this->inputFile;
	$filename_error="error.txt";
	$executable=" a.out ";

	$command=$CC." ".$filename_code;	

	$command_error=$command." 2> ".$filename_error;
	//echo $command_error;
	//echo $command_error;
	$err = "err.txt";
	//if(trim($code)=="")
	//die("The code area is empty");
	
	/*fwrite($file_code,$code);
	fclose($file_code);*/
	$code =file_get_contents($filename_code);
	//echo $this->source_code;
	//$file_in=fopen($filename_in,"w");
	//fwrite($file_in,$input);
	//fclose($file_in);
	//echo $filename_in;
	//echo $input_path;
	$prev_dir = getcwd();
	//echo $prev_dir;
	//echo $this->folderPath;
	if(file_exists($this->folderPath.'/cSandbox.c') == FALSE){
		copy(getcwd().'/cSandbox.c', $this->folderPath.'/cSandbox.c');
		$path_Array = explode("/",$this->folderPath);
		copy(getcwd().'/'.$path_Array[2].'/'.$path_Array[3].'/'.$path_Array[4].'/input.txt', $this->folderPath.'/input.txt');
		//$prev_directory = getcwd();
		chdir($this->folderPath);
		exec("chmod 777 cSandbox.c");
		exec("gcc -o sandbox cSandbox.c -lsandbox");
		exec("chmod 777 sandbox");
		exec("chmod 777 input.txt");
	}
	else
		chdir($this->folderPath);

	
	exec("chmod 777 err.txt"); 
	exec("chmod 777 $executable"); 
	exec("chmod 777 $filename_error");
	//exec("chmod 777 error.txt");
	//echo "<br>".getcwd();
	shell_exec($command_error);
	
	$input_code = "input.txt";

	shell_exec($command_error);
	$error=file_get_contents($filename_error);
	if(trim($error)=="")
	{
		if(trim($filename_in)=="")
		{
			//echo "123";
			$exe = "./sandbox " . $out . " 2> " . $err;
			$nerr = file_get_contents($err);
			//echo "\n $nerr \n";
			$output = shell_exec($exe);
		}
		else
		{
			//echo "hello";
			$exe = "./sandbox " . $out . " 2> " . $err. " < ".$input_code;
			$nerr = file_get_contents($err);
			//echo "123";
			$output = shell_exec($exe);
		}
		$arr = explode("\n",$nerr);
		$new = explode(" ",$arr[0]);
		//echo $new[1];
		if(strcasecmp($new[1],"OK") == 0)
		{
       //return $output;
			if(strcmp($code_output,$output) == 1)
			{
				
				
				//$output_file=file_get_contents("output.txt");
                $this->scoreupdate();
 
				return "right";
			}
			else
				return "WRONG ANSWER";
		}
		//echo $new[1];
		else if((strcasecmp($new[1],"ML") == 0) || (strcasecmp($new[1],"RT") == 0))
			$st = "Memory Limit Exceed";
		else if(strcasecmp($new[1],"TL") == 0)
			$st= " Time Limit Exceed ";
		else
			$st = "Runtime Error";
		return $st;
	}
	else
	{
		return $error;
	}
}
function check_ques(){
	global $conn;
	$q = "q".$this->qus_no;
	$lev="level".$this->level;
	$username=$this->userid;
      $sql = "SELECT $q FROM $lev WHERE username ='$username'";
	if($conn->query($sql)==FALSE)
	    die($conn->error);
	$result=$conn->query($sql);
	if($result->num_rows>0){
         $row = $result->fetch_assoc();
	}
	if($row[$q]==1)
	  return 0;
	else
		return 1; 
		//return $row[$q];   
}
 function scoreupdate(){
 	
	global $conn;
 	$q = "q".$this->qus_no;
	$lev="level".$this->level;
	$username=$this->userid;
	$sql = "UPDATE $lev set $q=1 where username='$username'";
 	
    if($conn->query($sql)==FALSE){
    	die($conn->error);
         }
	if($_SESSION['level']==1 || $_SESSION['level']==4){
		
       $sc = 100;      
     }
	else if($_SESSION['level']==2){
         
	}
	else if($_SESSION['level']==3){
        echo $this->level3($this->code);
    }
 	$sql ="UPDATE `player` SET `score` = `score`+$sc,`$lev`=`$lev`+$sc WHERE `username` = '$username'";
    
    if($conn->query($sql)==FALSE){
    	die($conn->error);
       } 
    //$sql = "UPDATE player set score = 100 , level =100 where username = '$username'";

    
         
     }

   function level3($code){
   	$result = preg_split("/[\s,(]+/",$code);
	$sum = 0;
	for($i = 0 ; $i < count($result) ;$i = $i + 1){
		//;
		switch($result[$i]){
			case "int":{
				$sum = $sum + 100;
				break;
			}
			case "float":{
				$sum = $sum + 200;
				break;
			}
			case "double":{
				$sum = $sum + 300;
				break;
			}
			case "if":
				$sum = $sum + 1000;
			break;
			case "else":
				$sum = $sum + 500;
			break;
			case "for":
				$sum = $sum + 2000;
			break;
		}
		//echo "$sum ";
	}
	return $sum;
   }  
 }


?>
