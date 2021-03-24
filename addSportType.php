<?php
require_once 'lib/Smarty.class.php';
require_once './function.php';

$conn = conn();

if (isset($_GET['del_id'])) {

    $del_id = $_GET['del_id'];

    $delSportType = ORM::for_table('sport_type')->find_one($del_id);
    $delSportType->delete();

    header("Location: ./addSportType.php");
}


if (isset($_POST['sport_type']) && $_POST['sport_type'] != '') {

    $sport_type = htmlentities($_POST['sport_type']);

    $addSportType = ORM::for_table('sport_type')->create();
    $addSportType->sport_type = $sport_type;
    $addSportType->save();
}
$all_sport_type = select_sport_type($conn);

$smarty = smarty_conn();

$smarty->assign('all_sport_type',$all_sport_type);
$smarty->display('add_sportType.tpl');

?>

