

<?php  
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
		
		
     	  if((trim($code)==="return")||(strcmp(substr($code,strpos($code," return "),8)," return ")==0)||((strcmp(substr($code,strpos($code,"return "),7),"return "))==0 && (strpos($code,"return ")==0)))
		  {
			  return false ;
		  }
		  if((trim($code)==="scanf")||(strcmp(substr($code,strpos($code," scanf "),7)," scanf ")==0)||((strcmp(substr($code,strpos($code,"scanf "),6),"scanf "))==0 && (strpos($code,"scanf ")==0)))
		  {
			  return false ;
		  }
		  if((trim($code)==="printf")||(strcmp(substr($code,strpos($code," printf "),8)," printf ")==0)||((strcmp(substr($code,strpos($code,"printf "),7),"printf "))==0 && (strpos($code,"printf ")==0)))
		  {
			  return false ;
		  }
		  if((trim($code)==="for")||(strcmp(substr($code,strpos($code," for "),5)," for ")==0)||((strcmp(substr($code,strpos($code,"for "),4),"for "))==0 && (strpos($code,"for ")==0)))
		  {
			  return false ;
		  }
		  if((trim($code)==="while")||(strcmp(substr($code,strpos($code," while "),7)," while ")==0)||((strcmp(substr($code,strpos($code,"while "),6),"while "))==0 && (strpos($code,"while ")==0)))
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
          if($ch == '[')
          {
            $ans .= '{
';
            if($code[1] === ']')
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
            return  $ans.checkFun($s);//
          }
          elseif($ch === 'g')
          {
            return $ans.checkReturn($s);//
          }
          elseif($ch === 'i')
          {
            return $ans.checkIf($s);//
          }
          elseif($ch ===  'e')
          {
            return $ans.checkElse($s);//
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