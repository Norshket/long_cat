<?php 

class Athleth extends BaseService {
    function delete(){
        $delId = (int)$_GET['del_id']; 
        $delSportType = ORM::for_table('athletes')->find_one($delId);
        $delSportType->delete();
        header("Location: /athleth/view");
        die();
    }

    function add(){
        $name = htmlentities($_POST['name']);
        $sureName =  htmlentities($_POST['sure_name']);
        $patronymic = htmlentities($_POST['patronymic']);

        $addAthletes = ORM::for_table('athletes')->create();
        $addAthletes->name = $name;
        $addAthletes->sure_name = $sureName;
        $addAthletes->patronymic = $patronymic;
        $addAthletes->save();
        header("Location: /athleth/view");
        die();
    }
    function view(){       
        $athletes = ORM::for_table('athletes')->order_by_asc('name')->find_array();   -          
        $this->smarty->assign('athletes',$athletes);
        $this->smarty->display('add_athleth.tpl');
        return true;
    }
}


?>