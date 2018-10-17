<?php
	function getwritePart($part)
	{
			$sep = explode(',',trim($part));
			//print_r($sep);
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
					$varname .= ",".$var;
					$type .= getSign(getDataType($part[strlen($part)-1]));
			    }	
			    
				
				else
			    return false;
			}
				
		$type .= '"'.$varname;
			return $type;
	}

function checkWrite($line)
{
            
		     $line = trim($line);
			 //echo $line ;
			 $s = substr($line,0,6);
			 $parsedCode = '';
			 if(strcmp($s,'write(')==0 )
			{
					if( $line[strlen($line)-1] == ')')
					{
						$internalPart = substr($line,6,strlen($line)-7);
						//echo $internalPart;
						$v = getwritePart($internalPart);
					    if($v == false)
					        return false;
						$parsedCode .='printf('.$v.')';
						//echo $parsedCode;
						return $parsedCode.';';
					
			        }
			        else
				        return false;
	        }
	return $line.";";
}


?>