<?php 
require_once 'configs/config.php';
require_once 'lib/Smarty.class.php';
require_once 'idiorm/idiorm.php';

class SportType{
    

    function del($del){
    conn();
    $del_id = (int)$del;
    $delSportType = ORM::for_table('sport_type')->find_one($del_id);
    $delSportType->delete();
    
    }

    function add($add){
        conn();

        $sport_type = htmlentities($add);
        $addSportType = ORM::for_table('sport_type')->create();
        $addSportType->sport_type = $sport_type;
        $addSportType->save();
    }

    function output(){
        conn();
        $sport_type = ORM::for_table('sport_type')->order_by_desc('sport_type')->find_array();
        $smarty = smarty_conn();
        $smarty->assign('all_sport_type',$sport_type);
        $smarty->display('add_sportType.tpl');

    }
}

?>