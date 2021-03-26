<?php
    
    echo"<pre>";
    var_dump($_SERVER);
    echo"</pre>";
echo'<pre>';
var_dump($a);
echo'</pre>';

require_once 'classes/index.class.php';


$medals = new Index;

$medals->output($_GET['column'] , $_GET['type_sort']);




?>

    
    
