<?php
require_once 'idiorm/idiorm.php';
require_once 'configs/config.php';


function select_medal_type()
{
    conn();
    $medal_type = ORM::for_table('medal_type')->order_by_asc('id')->find_array();
    return $medal_type;
}


function select_country()
{
    conn();
    $select_country = ORM::for_table('country')->order_by_asc('country')->find_array();
    return $select_country;
}


function select_athletes()
{
    conn();
    $athletes = ORM::for_table('athletes')->order_by_asc('name')->find_array();
    return $athletes;
}



function country_medals()
{ 
    conn();
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


    return $country_medals;
}

