<?php
require_once 'lib/Smarty.class.php';
require_once 'function.php';

$conn = conn();

if (isset($_GET['del_id'])) {

    $del_id = (int) $_GET['del_id'];

    $delSportType = ORM::for_table('athletes')->find_one($del_id);
    $delSportType->delete();

    header("Location: addAthleth.php");
}
if ($_POST['name'] != '' && $_POST['sure_name'] != '') {
    $name = htmlentities($_POST['name']);
    $sure_name =  htmlentities($_POST['sure_name']);
    $patronymic = htmlentities($_POST['patronymic']);


    $addAthletes = ORM::for_table('athletes')->create();
    $addAthletes->name = $name;
    $addAthletes->sure_name = $sure_name;
    $addAthletes->patronymic = $patronymic;
    $addAthletes->save();
}
$athletes = select_athletes($conn);

$smarty = smarty_conn();

$smarty->assign('athletes',$athletes);
$smarty->display('add_athleth.tpl');

?>

