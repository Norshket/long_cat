<?php
       class BaseService{ 
        public $smarty;
        function __construct()
        {
            $smarty=new Smarty();
            $smarty-> template_dir='template';
            $smarty-> compile_dir='template_c';
            $smarty->config_dir='config';
            $smarty->cache_dir='cache';
            $this->smarty=$smarty;   
        }

}
?>