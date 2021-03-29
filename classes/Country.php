<?php
class Country extends BaseService { 

    function delete(){
        $delId = (int)$_GET['del_id'];   

        $delSportType = ORM::for_table('country')->find_one($delId);    

        $delSportType->delete();
        header("Location: /country/view");
        die();
    }
 
    function view(){  

        $allCountry = ORM::for_table('country')->order_by_asc('country')->find_array();

        $this->smarty->assign('all_country',$allCountry);
        $this->smarty->display('add_country.tpl');
        die();
    }

    function add()
    {       
        $country = htmlentities($_POST['country']);
        $addCountry = ORM::for_table('country')->create();
        $addCountry->country = $country;
        $addCountry->save();
        header("Location: /country/view");
        return true;
    }
}


?>