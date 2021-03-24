<?php

require_once 'lib/Smarty.class.php';
require_once 'function.php';

$conn = conn();

if (isset($_GET['del_id'])) {

    $del_id = (int) $_GET['del_id'];

    $delSportType = ORM::for_table('country')->find_one($del_id);
    $delSportType->delete();

    header("Location: addCountry.php");
}

if (isset($_POST['country']) && $_POST['country'] != '') {


    $country = htmlentities($_POST['country']);


    $addCountry = ORM::for_table('country')->create();
    $addCountry->country = $country;
    $addCountry->save();


    if ($result) {
        header("Location: addCountry.php");
    }
}

$all_country = select_country($conn);

$smarty = smarty_conn();

$smarty->assign('all_country',$all_country);
$smarty->display('add_country.tpl');

?>

