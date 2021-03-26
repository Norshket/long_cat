<?php
   

    $arr =parse_url($_SERVER['REQUEST_URI'] );
    
       $path= explode("/", $arr['path']);
      


    $obj = new $path[1]();
    //$obj->output();
    $obj->{$path[2]}();



    

    
