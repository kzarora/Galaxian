<?php 

function getActualParameters($param)
    {
		$param=trim($param);
		if($param==NULL)
		{
			return " ";
		}
        $l = strlen($param);
        $ans = '';
        $total = '';
        for($i=0;$i<=$l;$i++)
        {
          //either the comma will come or the end of the string reach
          if( $i === $l || $param[$i] === ',')
          {
             //echo $total.'</br>';
             $total = trim($total);
             if($total['0']==='v')
             {
                 $num = substr($total,0,8);
                 //echo $num;
                 if($num==='var_typ ')
                 {
                  $total = substr($total,8);
                  $flag = 0 ;

                  $vrblName = substr($total, 0,strrpos($total, '.'));             
                  //echo $vrblName."</br>";
                  $dt = substr($total,strlen($vrblName)+1);
                  //echo $vrblName." ".$dt."</br>";
                  $dt = getDataType($dt);
                  $ans .= $dt.' '.$vrblName;
                  if($i != $l)
                  $ans.=',';
                 // printf("%s%s");
                 }
              }
              else if($total['0']==='a')
              {
                    $num = substr($total,0,6);
                     //echo $num;
                     if($num==='array ')
                     {
                      $total = substr($total,6);
                      $flag = 0 ;

                      $vrblName = substr($total, 0,strrpos($total, '.'));             
                      //echo $vrblName."</br>";
                      $dt = substr($total,strlen($vrblName)+1,1);
                      //echo $vrblName." ".$dt."</br>";
                      $dt = getDataType($dt);
                      $ans .= $dt.' '.$vrblName;
                      $ans .=substr($total,strlen($vrblName)+2);
                      if($i != $l)
                      $ans.=',';
                     }
              }
             else
             {
              //the wrong syntax has been using in the parameter declaration
              return "Wrong syntax";
             }
             $total = '';

          }
          else
          {
             $total .= $param[$i];
          }
        }
        //printf("</br>ans is %s",$ans);
        return $ans;
    }
  




/*


function getActualParameters($param)
    {
        $l = strlen($param);
        $ans = '';
        $total = '';
        for($i=0;$i<=$l;$i++)
        {
          //either the comma will come or the end of the string reach
          if( $i === $l || $param[$i] === ',')
          {
             //echo $total.'</br>';
             $total = trim($total);
             $num = substr($total,0,8);
             //echo $num;
             if($num==='var_typ ')
             {
              $total = substr($total,8);
              $flag = 0 ;

              $vrblName = substr($total, 0,strrpos($total, '.'));             
              //echo $vrblName."</br>";
              $dt = substr($total,strlen($vrblName)+1);
              //echo $vrblName." ".$dt."</br>";
              $dt = getDataType($dt);
              $ans .= $dt.' '.$vrblName;
              if($i != $l)
              $ans.=',';
             // printf("%s%s");
             }
             else
             {
              //the wrong syntax has been using in the parameter declaration
              return "Wrong syntax";
             }
             $total = '';

          }
          else
          {
             $total .= $param[$i];
          }
        }
        //printf("</br>ans is %s",$ans);
        return $ans;
    }


*/




/*

function getActualParameters($param)
    {
        $l = strlen($param);
        $ans = '';
        $total = '';
        for($i=0;$i<=$l;$i++)
        {
          //either the comma will come or the end of the string reach
          if( $i === $l || $param[$i] === ',')
          {
             //echo $total.'</br>';
             //$total = trim($total);
             $num = substr($total,0,8);
             //echo $num;
             if($num==='var_typ ')
             {
              $total = substr($total,8);
              $flag = 0 ;

              $vrblName = substr($total, 0,strrpos($total, '.'));             
              //echo $vrblName."</br>";
              $dt = substr($total,strlen($vrblName)+1);
              //echo $vrblName." ".$dt."</br>";
              $dt = getDataType($dt);
              $ans .= $dt.' '.$vrblName;
              if($i != $l)
              $ans.=',';
             // printf("%s%s");
             }
             else
             {
              //the wrong syntax has been using in the parameter declaration
              return "Wrong syntax";
             }
             $total = '';

          }
          else
          {
             $total .= $param[$i];
          }
        }
        //printf("</br>ans is %s",$ans);
        return $ans;
    }

    */
    ?>