<?php
require_once 'configs/config.php';
require_once 'lib/Smarty.class.php';
require_once 'idiorm/idiorm.php';

class Country{   

    function del($del){
    conn();
    
    $del_id = (int)$del;        
    $delSportType = ORM::for_table('country')->find_one($del_id);
    $delSportType->delete();
    return true;
    }

    
    function output(){
    conn();  
            
    $all_country = ORM::for_table('country')->order_by_asc('country')->find_array();;
    $smarty = smarty_conn();
    $smarty->assign('all_country',$all_country);
    $smarty->display('add_country.tpl');
    return true;
    }

    function add($add)
    {       
    conn();  
    $country = htmlentities($add);
    $addCountry = ORM::for_table('country')->create();
    $addCountry->country = $country;
    $addCountry->save();
    return true;

    }
}

?>