<?php
require_once 'lib/Smarty.class.php';
require_once 'idiorm/idiorm.php';
require_once './classes/BaseService.php';

function conn(){    
    ORM::configure('mysql:host=localhost;dbname=awards');
    ORM::configure('username', 'root');
    ORM::configure('password', ''); 
try{      
    ORM::get_db();        
}catch(Exception $e){
    echo "подключение отсутствует";
    die();
}    
return true;
}


conn();

?>