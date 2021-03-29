<?php 
class Page extends BaseService { 
    
    function view(){
        $country =(int)$_GET['country_id'];

        $medalsNamesCountry = ORM:: for_table('country_medals')
                            ->select('medal_type.medal_type')
                            ->select('country.country')
                            ->select('sport_type.sport_type')
                            ->select_expr("GROUP_CONCAT(DISTINCT athletes.name , athletes.sure_name , athletes.patronymic SEPARATOR ', ')" , 'name')
                            ->join('medal_type','country_medals.medal_type_id = medal_type.id')
                            ->join('country' ,'country_medals.country_id = country.id')
                            ->join('athletes','country_medals.athletes_id = athletes.id')
                            ->join('sport_type','country_medals.sport_type_id = sport_type.id')
                            ->where('country.id',$country);

        if ($_GET['medal']){
            $medal=(int)$_GET['medal']; 
            
            $medalsNamesCountry->where('country_medals.medal_type_id', $medal);   
                                
        }
                            
        $medalsNamesCountry = $medalsNamesCountry->group_by('team')
                                                ->find_array();                                           

   
        $this->smarty->assign('country',$country);
        $this->smarty->assign('medalsNamesCountry', $medalsNamesCountry);
        $this->smarty->display('page_awards.tpl');
        return true;
    }
}



?>