<?php

$arr =parse_url($_SERVER['REQUEST_URI'] );  
$path= explode("/", $arr['path']);

if(empty($path[1])){
   $path[1]='main';
   $path[2]='view';
}

if(file_exists('classes/'.$path[1].'.php')){
   require_once 'classes/'.$path[1].'.php';
   $obj = new $path[1]();

   if(method_exists ($obj ,$path[2])){
       $obj->{$path[2]}();
   }else {
	   die('Not found');
   } 

}else {
	die('Not found');
}   