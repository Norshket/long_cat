<?php

require_once 'classes/Page.class.php';

if (!$_GET) {
    header('Location: /');
}

$page= new Page;
$page->output( $_GET['medal'] ,$_GET['country'])



?>

