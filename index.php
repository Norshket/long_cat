<?php
require_once 'lib/Smarty.class.php';
require_once 'function.php';

$medals = [];
$conn = conn();
$type_sort = 'desc';
$column = 'gold';

if (isset($_GET['type_sort'])) {

    $type_sort = $_GET['type_sort'];
}
if (isset($_GET['column'])) {

    $column = $_GET['column'];
}

$medals =  ORM::for_table('country_medals')
            ->select_expr('ROW_NUMBER() OVER(ORDER BY gold desc, silver desc, cuprum desc ) ','position')
            ->select_expr(' SUM(medal_type_id=1)','gold')
            ->select_expr(' SUM(medal_type_id=2)','silver')
            ->select_expr(' SUM(medal_type_id=3)','cuprum')
            ->select_expr(' COUNT(medal_type_id)','all_medals')
            ->select('country')
            ->join('country' ,'country_medals.country_id = country.id')
            ->group_by('country_id')
            ->order_by_expr(  $column . " " . $type_sort)
            ->find_array();  



$smarty = smarty_conn();
$smarty->assign('medals',$medals);
$smarty->assign('type_sort',$type_sort);
$smarty->assign('column',$column);

$smarty->display('index.tpl');
?>

    
    
