<?php
//require ("getOperators.php");
function changeToOperators($condition)
{
$operator = array('-lt'=>'<','-le'=>'<=','-gt'=>'>','-ge'=>'>=','-ne'=>'!=','-et'=>'==','-dand'=>'&&','-dor'=>'||','-and'=>'&','-or'=>'|');
		foreach ($operator as $key => $value) 
		{
			//str_replace(search, replace, subject)
			$condition = str_replace($key, $value, $condition);
		}
		return $condition;
}
	function checkIf($line)
	{
		$line = trim($line);
		$s= substr($line,0,3);
		$parsedCode = '';
		if(strcmp($s,"if ")=== 0)
		{
			$parsedCode .= "if(";
			$parsedCode .= changeToOperators(substr($line,3)).')';
			return $parsedCode;
		}
		return $line.";";
	}

?>