<?php 

class SportType  extends BaseService{
        
    function delete(){
    $del_id = (int)$_GET['del_id']; 

    $delSportType = ORM::for_table('sport_type')->find_one($del_id);

    $delSportType->delete();
    header("Location: /sporttype/view");
    die();
    }

    function add(){
        $sportType = htmlentities($_POST['sport_type']);

        $addSportType = ORM::for_table('sport_type')->create();
        
        $addSportType->sport_type = $sportType;
        $addSportType->save();
        header("Location: /sporttype/view");
        die();
    }

    function view(){     
        $sport_type = ORM::for_table('sport_type')->order_by_desc('sport_type')->find_array();
     
        $this->smarty->assign('all_sport_type',$sport_type);
        $this->smarty->display('add_sportType.tpl');
    }
}

?>