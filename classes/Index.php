<?php
require_once 'configs/config.php';
require_once 'lib/Smarty.class.php';
require_once 'idiorm/idiorm.php';

class Index{

    function output()
    {
        $type_sort = 'desc';
        $column = 'gold';

        if (isset($col)) {

            $column  = $col;
        }
        if (isset($sort)) {
          
            $type_sort  = $sort;
        }

        conn();
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

    }


}


?>