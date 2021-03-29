<?php

class Main extends BaseService{

    function view()
    {
        $typeSort = 'desc';
        $column = 'gold';

        if (isset($_GET['column'])) {

            $column  = $_GET['column'];
        }
        if (isset($_GET['type_sort'])) {
          
            $typeSort  = $_GET['type_sort'];
        }

        $medals =  ORM::for_table('country_medals')
        ->select_expr('ROW_NUMBER() OVER(ORDER BY gold desc, silver desc, cuprum desc ) ','position')
        ->select_expr(' SUM(medal_type_id=1)','gold')
        ->select_expr(' SUM(medal_type_id=2)','silver')
        ->select_expr(' SUM(medal_type_id=3)','cuprum')
        ->select_expr(' COUNT(medal_type_id)','all_medals')
        ->select('country')
        ->select('country.id','country_id')
        ->join('country' ,'country_medals.country_id = country.id')
        ->group_by('country_id')
        ->order_by_expr(  $column . " " . $typeSort)
        ->find_array();

        $this->smarty->assign('medals',$medals);
        $this->smarty->assign('type_sort',$typeSort);
        $this->smarty->assign('column',$column);

        $this->smarty->display('main.tpl');
        return true;

    }


}


?>