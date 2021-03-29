<?php

class Medals extends BaseService  {

    function delete(){

        $delId = (int)$_GET['del_id']; 
        $delSportType = ORM::for_table('country_medals')->find_one($delId);
        $delSportType->delete();
        header("Location: /medals/view");
        die();
    }

    function add()
    {
        $countryId = (int)$_POST['country'];
        $medalsId = (int)$_POST['medals'];
        $sportTypesId = (int)$_POST['sport_type'];
        $athletesName = (array)$_POST['athletes'];
        $team = uniqid();

        if (!empty($athletes)) {
            foreach ($athletesName as $id) {
                if ($id != 0) {
                    $addMedals = ORM::for_table('country_medals')->create();
                    $addMedals->medal_type_id = $medalsId;
                    $addMedals->country_id = $countryId;
                    $addMedals->team = $team;
                    $addMedals->sport_type_id = $sportTypesId;
                    $addMedals->athletes_id = $id;
                    $addMedals->save();
                }
            }
        }

        header("Location: /medals/view");
        die();
    }

    function view(){
  
        $medals = ORM::for_table('medal_type')->order_by_asc('id')->find_array();
        $sportType = ORM::for_table('sport_type')->order_by_desc('sport_type')->find_array();
        $country = ORM::for_table('country')->order_by_asc('country')->find_array();
        $athletes = ORM::for_table('athletes')->order_by_asc('name')->find_array();

        $countryMedals= ORM::for_table('country_medals')
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

      
        $this->smarty->assign('country_medals',$countryMedals);
        $this->smarty->assign('medals',$medals);
        $this->smarty->assign('sport_type', $sportType);
        $this->smarty->assign('country', $country);
        $this->smarty->assign('athletes', $athletes);

        $this->smarty->display('add_medals.tpl');
        return true;
    } 
}



?>