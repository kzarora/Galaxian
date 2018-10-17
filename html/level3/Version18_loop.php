<?php
//require ("getOperators.php");
function checkLoop($line)
{
	$s = substr($line,0,5);
	if(strcmp($s,"loop ")==0)
	{
		return "for(".changeToOperators(str_replace(',', ";", substr($line,5))).")";
	}
	return $line.";";
}

?>