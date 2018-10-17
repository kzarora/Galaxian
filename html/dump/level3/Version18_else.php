<?php

	function checkElse($line)
	{
			if(strcmp(trim($line),"else")==0)
				return "else";
			return $line.";";
	}


?>