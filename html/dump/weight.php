<?php
echo "Output ";
	$CC="gcc";
	$out="a";
	$code=$_POST["code"];
	$input=$_POST["input"];
	$filename_code="main.c";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="a";
	$command=$CC." -lm ".$filename_code;	
	$command_error=$command." 2>".$filename_error;
echo "Output ";
	//if(trim($code)=="")
	//die("The code area is empty");
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
	echo "$sum"."\n";	
	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("chmod 777 $executable"); 
	exec("chmod 777 $filename_error");	

	//shell_exec($command_error);
	$error=file_get_contents($filename_error);
	$output=shell_exec($out);
	echo"$output"
	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		echo "<pre>$output</pre>";
	}
	else if(!strpos($error,"error"))
	{
		echo "<pre>$error</pre>";
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		echo "<pre>$output</pre>";
	}
	else
	{
		echo "<pre>$error</pre>";
	}
	exec("rm $filename_code");
	exec("rm *.o");
	exec("rm *.txt");
	exec("rm $executable");
?>
