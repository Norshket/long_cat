<?php

require_once 'classes/Medals.class.php';

$country_medals= new Medals;

if (isset($_GET['del_id'])) {

    $country_medals->del($_GET['del_id']);

    header("Location: addMedals.php");
}


if (isset($_POST['athletes']) && $_POST['athletes']) {

   $country_medals->add($_POST['country'],$_POST['medals'],$_POST['sport_type'] , $_POST['athletes'] ); 
}

$country_medals->output();


?>

