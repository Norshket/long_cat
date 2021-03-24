<?php

require_once 'lib/Smarty.class.php';
require_once 'function.php';
$error = [];

$conn = conn();


$medals = select_medal_type();
$sport_type = select_sport_type();
$country = select_country();
$athletes = select_athletes();



if (isset($_GET['del_id'])) {

    $del_id = (int) $_GET['del_id'];

    $delSportType = ORM::for_table('country_medals')->find_one($del_id);
    $delSportType->delete();


    header("Location: addMedals.php");
}

$athletes_name = $_POST['athletes'];

if (isset($athletes_name)) {

    $country_id = (int)$_POST['country'];
    $medals_id = (int) $_POST['medals'];
    $sport_types_id = (int)$_POST['sport_type'];
    $team = uniqid();

    foreach ($athletes_name as $id) {
        if ($id != 0) {

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


$country_medals = country_medals();

$smarty = smarty_conn();

$smarty->assign('country_medals',$country_medals);
$smarty->assign('medals',$medals);
$smarty->assign('sport_type', $sport_type);
$smarty->assign('country', $country);
$smarty->assign('athletes', $athletes);

$smarty->display('add_medals.tpl');

?>

