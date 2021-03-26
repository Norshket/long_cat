<?php 
require_once 'configs/config.php';
require_once 'idiorm/idiorm.php';
require_once 'lib/Smarty.class.php';


class Athleth{

    function delete(){
        conn();
        $del_id = (int) $this->del;
        $delSportType = ORM::for_table('athletes')->find_one($del_id);
        $delSportType->delete();
    }

    function addAthleth($name, $sure_name,$patronymic ){
        conn();  
        $name = htmlentities($name);
        $sure_name =  htmlentities($sure_name);
        $patronymic = htmlentities($patronymic);

        $addAthletes = ORM::for_table('athletes')->create();
        $addAthletes->name = $name;
        $addAthletes->sure_name = $sure_name;
        $addAthletes->patronymic = $patronymic;
        $addAthletes->save();

    }
    function output(){

        conn();                       
        $athletes = ORM::for_table('athletes')->order_by_asc('name')->find_array();
        $smarty = smarty_conn();        
        $smarty->assign('athletes',$athletes);
        $smarty->display('add_athleth.tpl');
    }
}


?>