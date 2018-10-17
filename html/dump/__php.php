<?php
  sesssion_start();
  class answer(){
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
	var $mode;
       function __construct($Code,$mode)
	{
	$this->userid = $_SESSION['username'];
	$this->level = $_SESSION['level'];
	$this->qus_no = $_SESSION['qus_no'];
	$this->folderPath = $this->userid."/level".$this->level."/q1".$this->qus_no; 
	$this->exec = $this->folderPath."/q1".$this->qus_no;
	$this->source_code = $this->exec.$mode;
	$this->outputFile = $this->folderPath."/output.txt";
	$this->stdErrFile = $this->folderPath."/error.txt";
	$this->inputFile = "questions/level_".$this->level."/question_".$this->qus_no."/input_";
	$this->answerFile = "questions/level_".$this->level."/question_".$this->qus_no."/output_";
	$this->code = $Code;
	//$this->testCases = intval($_SESSION['test_cases']);
	}

	function createFiles()
	{

    file_put_contents($this->source_code, $this->code);
	file_put_contents($this->outputFile, ' ');
	file_put_contents($this->stdErrFile, ' ');
	
	}
	
	function runCommand()
	{


	$run_command = "python compile.py $this->exec $this->inputFile $this->outputFile 2> $this->stdErrFile";
	shell_exec($run_command);
	$result = file_get_contents($this->outputFile);
	$actualAnswer = file_get_contents($this->answerFile);
	$error = file_get_contents($this->stdErrFile);
		if($actualAnswer === $result)
	{
		//if all the test cases pass
		echo '<script>alert("You Have Pass All Test Case Moving on to the next....")</script>';	
		//$this->putIntoDB();
		return $result;
	}
	else
		return $error;

	}
	function compileCommand()
	{
	$compile_command = "gcc -o $this->exec $this->source_code -lsandbox 2> $this->outputFile";
	shell_exec($compile_command);
	$output = file_get_contents($this->outputFile);
	if(isset($output))
	{
		return $output;
	}

	}
	function executeCommand()
	{
	$this->compileCommand();
	$this->runCommand();
	}


  }
?>
