 <?php 
    //require("get_parameter.php");
    //require("get_data_type.php");

	
	
	
    function getFunctionName($line)
    { 
	   //echo $line ;
      $pos = strpos($line, '(');
      $funName = '';
      for($i=$pos-1; $i>=0;$i--)
      {
          if($line[$i] === ' ')
          {
			  //echo $funName;
            return strrev($funName);
          }
          $funName .= $line[$i];
      }
    }

    function getParameters($line)
    {
      $s = strpos($line,'('); 
      $p = '';
      for($i=$s+1;$i<strlen($line);$i++ )
      {
          if($line[$i] === ')')
          {
              return $p;
          }
          $p .= $line[$i];
		  
      }
      return false;
    }

	
	
  function checkfun($line)
    {
		
              $line =trim($line);
			  //echo $line ;
              $str = "function ";
              $flag = 0;
              $fun = substr($line,0,9);
              $parsedCode = '';
			  $num='';
              if(strcmp($str,$fun) === 0)
              {
				  //echo $line ;
                $dataType= "";
                $dt='';
                $i = 0 ;
				$p=strpos($line,'.');
				//echo $p ;
				//echo $line[$p];
                $num= substr($line,9,strpos($line,'.')+2-9);
				$num = trim($num);
                $dataType = $num[8];
				//echo $dataType ;
                $num = substr($num,0,8);
				//echo $num;
                   if(strcmp($num,"var_typ.") === 0)
                  {
                  $dt = getDataType($dataType);
				  //echo $dt;
                  //printf("\nData type is  = %s</br>",$dt);
                  $funName = getFunctionName($line);
				  //echo $funName ;
                  $parsedCode .= $dt.' '.$funName.'(' ;
                  $param =getParameters($line);
				  
				  //echo $param ;
				  $param=trim($param);
                    if($param === false)
                      return false;
                    $parsedCode .= getActualParameters($param).')';
					//echo $parsedCode ;
                return $parsedCode;
                }
                else
                {
                    return false;
                }
                  
              }
              else
			  {
				  
                return $line.';';
			  }
    }
      
?>