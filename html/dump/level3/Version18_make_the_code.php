
<?php
      function makeTheCode($type,$part)
    { 
      //echo $part."";
      //doing the partition
      $ar = explode(',',$part);
      //print_r($ar);
      $nvrbl = sizeof($ar);
      $sc ='';


      //since both of them having the condition these are the available operators 
      if($type  == "if" || $type == "loop")
      {
        if(strstr($part, "-le"))
        $part = str_replace('-le', '<=', $part);
        elseif(strstr($part, "-lt"))
        $part = str_replace('-lt', '<', $part);
        elseif(strstr($part, "-gt"))
        $part = str_replace('-gt', '>', $part);
        elseif(strstr($part, "-ge"))
        $part = str_replace('-ge', '>=', $part);   
        elseif(strstr($part, "-ne"))
        $part = str_replace('-ne', '!=', $part);   
        elseif(strstr($part, "-et"))
        $part = str_replace('-et', '==', $part);   
        elseif(strstr($part, "-dand"))
        $part = str_replace('-dand', '&&', $part);   
        elseif(strstr($part, "-dor"))
        $part = str_replace('-dor', '||', $part);
        elseif(strstr($part, "-and"))
        $part = str_replace('-and', '&', $part);   
        elseif(strstr($part, "-or"))
        $part = str_replace('-or', '|', $part);
            
      }

      if($type == "scanf")   {
            $sc = 'scanf("';
            //echo $sc;
            if($nvrbl != 0 )
            {
            for ($i=0; $i < $nvrbl; $i++) 
            { 
              $sc .= '%d';
            }
            $sc .= '",';
            for ( $i=0; $i < $nvrbl; $i++) 
            { 
              $sc .= '&';
              $sc .= $ar[$i];
              if($i != sizeof($ar)-1)
                $sc .= ',';
            } 
            $sc .= ');';
            }
            else
            {
              //put any of the variable
            }}
      if($type == "printf") {
        //echo "printf";
            $sc .= 'printf("';
            if($nvrbl != 0 )
            {
              for ($i=0; $i < $nvrbl ; $i++) 
                { 
                  $len = strlen($ar[$i]);
                  //varaible can be atmost of length 2
                  if($len <= 2)
                  {
                    $sc .= '%d ';
                  }
                  else
                  {
                    $sc .= '%s ';
                  }
                } 
                $sc .= '",';
                for ( $i=0; $i < $nvrbl; $i++) 
            {     
                  $len = strlen($ar[$i]);
                  //varaible can be atmost of length 2
                  //$ar contains the name of the variable
                  if($len <= 2)
                  {$sc .= $ar[$i];}
                  else
                  {
                    $sc .= '"';
                    $sc .= $ar[$i];
                    $sc .= '"';
                  }

              if($i != sizeof($ar)-1)
                $sc .= ',';
            } 
            $sc .= ');';
              //echo "$sc";
            }
          }
      if($type == "var_typ"){
        for ($i=0; $i < sizeof($ar); $i++) 
        { 
          //data type of the variable
            $ar[$i] = trim($ar[$i]);
            $dtype = substr($ar[$i], strlen($ar[$i])-1);    
            $var_name = substr($ar[$i], 0,strlen($ar[$i])-2);
            if($dtype == 'i')
            {
              $sc .= "int ".$var_name.";";
            }
            if($dtype == 'f')
            {
              $sc .= "float ".$var_name.";";
            }
            if($dtype == 'd')
            {
              $sc .= "double ".$var_name.";";
            }
            if($dtype == 'c')
            {
              $sc .= "char ".$var_name.";";
            }
            $sc .= "";
        }}
      if($type == "loop")
      {
        $part =str_replace(',', ';', $part);
        $sc.="for(".$part.")";
      }
      if($type == "if")
      {
        $sc.="if(".$part.")";
      }


        return $sc; 
        //echo "$sc";
    }?>