<?php
require_once './idiorm/idiorm.php';

function conn(){    
    ORM::configure('mysql:host=localhost;dbname=awards');
    ORM::configure('username', 'root');
    ORM::configure('password', '');
}

function select_medal_type()
{
    $medal_type = ORM::for_table('medal_type')->order_by_asc('id')->find_array();
    return $medal_type;
}


function select_sport_type()
{
    $sport_type = ORM::for_table('sport_type')->order_by_desc('sport_type')->find_array();
    return $sport_type;
}

function select_country()
{
    $sport_type = ORM::for_table('country')->order_by_asc('country')->find_array();
    return $sport_type;
}


function select_athletes()
{
    $athletes = ORM::for_table('athletes')->order_by_asc('name')->find_array();
    return $athletes;
}

function country_medals()
{ 
$country_medals= ORM::for_table('country_medals')
                ->select('country_medals.id')
                ->select_expr('country.country')
                ->select_expr('medal_type.medal_type')
                ->select_expr('sport_type.sport_type') 
                ->select_expr('athletes.name')
                ->join('athletes','country_medals.athletes_id = athletes.id')
                ->join('country','country_medals.country_id = country.id')
                ->join('medal_type','country_medals.medal_type_id = medal_type.id')
                ->join('sport_type','country_medals.sport_type_id = sport_type.id')
                ->order_by_desc('country')
                ->find_array();


    return $country_medals;
}