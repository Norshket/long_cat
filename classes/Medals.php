<?php

require_once 'configs/config.php';
require_once 'lib/Smarty.class.php';
require_once 'idiorm/idiorm.php';

class Medals{

    function delete($del){
        conn(); 
        $del_id = (int)$del;
        $delSportType = ORM::for_table('country_medals')->find_one($del_id);
        $delSportType->delete();
        header("Location: Index");
    }

    function add($country, $medals ,$sport_type, $athletes ){
        $country_id = (int)$country;
        $medals_id = (int)$medals;
        $sport_types_id = (int)$sport_type;
        $athletes_name = $athletes ;
        $team = uniqid();
    
        foreach ($athletes_name as $id) {
            if ($id != 0) {
                conn();    
                $addMedals = ORM::for_table('country_medals')->create();
                $addMedals->medal_type_id = $medals_id;
                $addMedals->country_id = $country_id;
                $addMedals->team = $team;
                $addMedals->sport_type_id = $sport_types_id;
                $addMedals->athletes_id = $id;
                $addMedals->save();
            }
            
        }
    }

    function output(){
        conn();
        $medals = ORM::for_table('medal_type')->order_by_asc('id')->find_array();
        $sport_type = ORM::for_table('sport_type')->order_by_desc('sport_type')->find_array();
        $country = ORM::for_table('country')->order_by_asc('country')->find_array();
        $athletes = ORM::for_table('athletes')->order_by_asc('name')->find_array();

        $country_medals= ORM::for_table('country_medals')
        ->select('country_medals.id')
        ->select('country.country')
        ->select('medal_type.medal_type')
        ->select('sport_type.sport_type') 
        ->select('athletes.name')
        ->select('athletes.sure_name')
        ->select('athletes.patronymic')
        ->join('athletes','country_medals.athletes_id = athletes.id')
        ->join('country','country_medals.country_id = country.id')
        ->join('medal_type','country_medals.medal_type_id = medal_type.id')
        ->join('sport_type','country_medals.sport_type_id = sport_type.id')
        ->order_by_desc('country')
        ->find_array();

        $smarty = smarty_conn();
        $smarty->assign('country_medals',$country_medals);
        $smarty->assign('medals',$medals);
        $smarty->assign('sport_type', $sport_type);
        $smarty->assign('country', $country);
        $smarty->assign('athletes', $athletes);

        $smarty->display('add_medals.tpl');
        return true;
    } 
}



?>