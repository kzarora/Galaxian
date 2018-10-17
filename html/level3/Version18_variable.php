<?php
//require("get_data_type.php");

function getInit($var)
{
	$sp = explode(',', $var);
	$total = '';
	for($i=0;$i<sizeof($sp);$i++)
	{
		$sk = trim($sp[$i]);
		$length = strlen($sk);
			if(($length >= 3 ) && (strcmp(($sk[$length-2]),'.')==0))
			{
				$total .= getDataType($sk[$length-1])." ".substr($sk,0,strlen($sk)-2).";";
			}
			else
				return false;
	}
	return $total;
}

function checkNumber($line)
{
	//echo $line ;
	$s = substr($line, 0,8);
	if(strcmp($s,"var_typ ")==0)
	{
		$var = substr($line,8);
		return getInit(trim($var));
	}	
	else
		return $line.";";
}

?>