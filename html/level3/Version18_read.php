<?php
function getSign($dt)
{
	$dt  = trim($dt);
	switch($dt)
	{
		case 'int':	return "%d";
		case 'float':return "%f";
		case 'double':		return "%lf";
		case 'char':	return "%c";	
	}
}


    function getDataType($dt)
    {
      $dt = trim($dt);
      switch($dt)
      {
        case 'i':return 'int';
        case 'f':return 'float';
        case 'd':return 'double';
        case 'c':return 'char';
        case 'v':return 'void';
      }
    }






	function getReadPart($part)
	{
			$sep = explode(',',trim($part));
			$total = '';
			$varname= '';
			$type = '"';
			for($i=0;$i<sizeof($sep);$i++)
			{	
				$part = trim($sep[$i]);
				if($part[0] === '"' )
				{
					return false;
				}
			
				if($part[strlen($part)-2] === '.' || strcmp($part[strlen($part)-2] ,'.')==0)
				{
					$var = substr($part,0,strlen($part)-2);
					$varname .= ",&".$var;
					$type .= getSign(getDataType($part[strlen($part)-1]));
			    }	
			    else
			    return false;
			}
				
		$type .= '"'.$varname;
			return $type;
	}

function checkRead($line)
{

	$line = trim($line);
	$s = substr($line,0,5);
	$parsedCode = '';
	if(strcmp($s,"read(") ==0)
	{
			if($line[strlen($line)-1] == ')')
			{
				$internalPart = substr($line,5,strlen($line)-6);
				$v = getReadPart($internalPart);
				if($v == false)
					return false;
						$parsedCode .='scanf('.$v.')';
						return $parsedCode.';';
			}
			else
				return false;
	}
	return $line.";";
}


?>