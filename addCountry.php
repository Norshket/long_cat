<?php

require_once 'classes/Country.class.php';

$country = new Country;

if (isset($_GET['del_id'])) {

    $country->del($_GET['del_id']);
    header("Location: addCountry.php");
}

if (isset($_POST['country']) && $_POST['country'] != '') {

 $country->add($_POST['country']);
 
}

$country->output();


?>

