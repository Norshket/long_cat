<?php


require_once 'classes/SportType.class.php';

$sport_type = new SportType;

if (isset($_GET['del_id'])) {

    $sport_type-> del($_GET['del_id']);    

    header("Location: ./addSportType.php");
}

if (isset($_POST['sport_type']) && $_POST['sport_type'] != '') {

    $sport_type->add($_POST['sport_type']);
}
$sport_type->output()

?>

