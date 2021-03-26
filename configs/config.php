<?php
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
}



function smarty_conn(){
    $smarty=new Smarty();
    $smarty-> template_dir='template';
    $smarty-> compile_dir='template_c';
    $smarty->config_dir='config';
    $smarty->cache_dir='cache';

    return $smarty;
}

?>