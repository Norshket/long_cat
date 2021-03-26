<?php
    
    function Bob(){
        $arr = explode("/", $_SERVER["SCRIPT_NAME"]); 
      
        $class= $arr[1];
        $method = $arr[2];
        echo $class, $method;

    }  
    Bob(); 
    
    

  



?>