<?php



require_once 'classes/Athleth.class.php';

$athleth = new Athleth;

if (isset($_GET['del_id'])) {

   $athleth->del($_GET['del_id']);

   header("Location: addAthleth.php");
}
if ($_POST['name'] != '' && $_POST['sure_name'] != '') {
    $athleth->addAthleth($_POST['name'],$_POST['sure_name'],$_POST['patronymic']);
}

$athleth->output( )

?>

