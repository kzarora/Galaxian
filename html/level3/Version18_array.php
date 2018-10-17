<?php
function parse_array($var1)
{
	//print_r($var1);
	//echo $var1;
 if (substr($var1,0,5)!="array")
     return $var1.";";
	$var1=substr($var1,6);
	//echo $var1 ;
	//$var=array();
	$var=explode(',',$var1);
	//print_r( $var);
	 $arr=array();
	 $i=0;
     foreach($var as $str)
	 {
	     $position = strpos($str, '.');//get position of '.'
         $filename= substr($str, $position+1,1);//get substring after this position
		 if($filename=='i'){
			 $arr[$i]="int ".trim(substr($str,0,$position)).substr($str,$position+2-strlen($str))." ;";
			 $i++;
		 }
		 if($filename=='f'){
			 $arr[$i]="float ".trim(substr($str,0,$position)).substr($str,$position+2-strlen($str))." ;";
			 $i++;
		 }
		  if($filename=='c'){
			 $arr[$i]="char ".trim(substr($str,0,$position)).substr($str,$position+2-strlen($str))." ;";
			 $i++;
		 }
		  if($filename=='d'){
			 $arr[$i]="double ".trim(substr($str,0,$position)).substr($str,$position+2-strlen($str))." ;";
			 $i++;
		 }
		 
	 }
	 $s=implode('',$arr);
	 //print($s);
	 
         
//print_r($arr);
	return $s;
}
?>