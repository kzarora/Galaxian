 <?php
require("Version18_parsing.php");

$str="";
$code = ' ';

//***********
function shub_to_adi($recieved)
{
	
	$converted= ' ';
	$converted=ParseCode($recieved);
	return $converted ;
}
//***********
	//if(isset($_POST['code']))
	

    $ntKeyword = 'is not the keyword';
    function error($value)
    {
		  //echo $value.'<br>' ;
		  
      return ' ';
    }
	
    function ParseCode($code)
    {
        $ans = " ";
        $wholeCode='int main(void)
{'.PHP_EOL;
          $ar = explode(";",$code);
          $str = $ar[0];  		  
          $err = ' ';
          $takeReturn = '';
        for ($i=1; $i < sizeof($ar) ; $i++) 
        { 
			if(($takeReturn = doParsing($str,$i))==true)
			{
                if(($err = error($takeReturn)) === ' ')
                {
                    $ans .= $takeReturn ;
					$str = $ar[$i];
                }
                else
                    return false;
            }
            else
            {
              echo '<script> alert ("Invalid Syntax") ; </script>';
              return false;
            }
        }
		return $wholeCode.$ans."}";
    }
?>
