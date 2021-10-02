<?php
    include_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

    class View {
        private $smarty;
        function __construct()
        {
            $this->smarty = new Smarty();
        }

        function showHome($personas){
            $this->smarty->assign('personas',$personas);
            $this->smarty->display('./templates/home.tpl');
        }

        function formNuevaPersona($ciudades){
            $this->smarty->assign('ciudades',$ciudades);
            $this->smarty->display('./templates/formNuevaPersona.tpl');
        }
    }