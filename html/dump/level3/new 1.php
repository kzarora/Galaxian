require_once("Version18_make_the_code.php");
require_once("Version18_get_parameter.php");
require_once("Version18_function.php");
require_once("Version18_else.php");
require_once("Version18_if.php");
require_once("Version18_return.php");
require_once("Version18_loop.php");
require_once("Version18_variable.php");
require_once("Version18_write.php");
require_once("Version18_read.php");
require_once("Version18_array.php");

/*Included Files */
    function doParsing($code,$i)
    {
		
    	  if(strpos($code," return "))
		  {
			  return false ;
		  }
		  if(strpos($code," scanf "))
		  {
			  return false ;
		  }
		  if(strpos($code,"scanf("))
		  {
			  return false ;
		  }
		  if(strpos($code," printf "))
		  {
			  return false ;
		  }
		  if(strpos($code,"printf(")||strpos($code," for ")||strpos($code,"while(")||strpos($code,"for(")||strpos($code," while "))
		  {
			   //echo '<script> alert ("Dont use keyword ") ; </script>';
			  return false ;
		  }
		  
          $code = trim($code);
          $s="";      
          $error = "";  
          $strt=$end=$part=$ch=$str="";
          $s = $code;
		  //echo $s ;
          $f = 0;
          $ch = mb_substr($code,0,1);
		  //echo $ch;
          $ans='';
          if($ch === '#' || $ch ==='/')
            return false;
          if($ch ==']')
          {
            return $ans.'}
';
          }
          if($ch ==='[')
          {
			  $ans .= '{
';
			}
            
            if($code[1] === ']')
			{
            	return $ans.'}
';
            $e = substr($code,1);
            $f = 1;
            $s = trim($e);
            //echo '</br>'.$s;
           
		  }
            
          if($f === 1)
            {
              $f = 0 ;
            $ch = $s[0];     
            }
          if($ch === 'f')
          {
            return  $ans.checkFun($s) ; //
          }
          elseif($ch === 'g')
          {
            return $ans.checkReturn($s);//
          }
          
          elseif($ch === 'i')
          {
              return $ans.checkIf($s);			  //
			  
          }
          elseif($ch ===  'e')
          {
            return $ans.checkElse($s);        //
          }

          elseif($ch === "v")
          {
            return $ans.checkNumber($s);//
          }
		  elseif($ch === "a")
          {
			
            return $ans.parse_array($s);//
          }
          elseif($ch === "l")
          {
            return $ans.checkLoop($s);//
          }
          elseif($ch==='w')
          {
			  return $ans.checkWrite($s);///
   	       }   		   
          elseif($ch === 'r')
          {
			
                return $ans.checkRead($s);///
          }   
          return $ans.$s.";";
    }

?>