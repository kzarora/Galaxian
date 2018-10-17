<?php


       function fun($file){
	$CC="gcc";
	$out="a.out";
	//$code=$_POST["code"];
	//$input=$_POST["input"];
	$filename_code=$file;
	
$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="a.out";
	$command=$CC." ".$filename_code;	
	$command_error=$command." 2>".$filename_error;
	$err = "err.txt";
	//if(trim($code)=="")
	//die("The code area is empty");
	
	/*$file_code=fopen($filename_code,"w");
	fwrite($file_code,$code);
	fclose($file_code);*/
	$code =file_get_contents($filename_code);
	$file_in=fopen($filename_in,"w");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("chmod 777 $executable"); 
	exec("chmod 777 $filename_error");	

	shell_exec($command_error);
	$error=file_get_contents($filename_error);

	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$exe = "./sandbox " . $out . " 2> " . $err;
			$nerr = file_get_contents($err);
			//echo "\n $nerr \n";
			$output = shell_exec($exe);
		}
		else
		{
			$exe = "./sandbox " . $out . " 2> " . $err. " < ". $filename_in;
			$nerr = file_get_contents($err);
			//echo "\n $nerr \n";
			$output = shell_exec($exe);
		}
		$arr = explode("\n",$nerr);
		$new = explode(" ",$arr[0]);
		//echo $new[1];
		if(strcasecmp($new[1],"OK") == 0)
			return $output;
		if(strcasecmp($new[1],"ML") == 0)
			return $st = "Memory Limit Exceed";
		if(strcasecmp($new[1],"TL") == 0)
			$st= " Time Limit Exceed ";
		return $st;
	}
	else
	{
		return $error;
	}
}
//echo fun("new.c");
/*
	exec("rm $filename_code");
	exec("rm *.o");
	exec("rm *.txt");
	exec("rm $executable");*/
?>
