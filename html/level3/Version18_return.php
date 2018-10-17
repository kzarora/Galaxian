<?php

function checkReturn($line)
{
	$line = trim($line);
	$s = substr($line,0,10);
	if(strcmp($s,"give_back ")==0)
	{
		return 'return '.substr($line,10).';';
	}
	else
		return $line;
}

?>