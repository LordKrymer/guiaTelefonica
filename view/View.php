<?php
    include_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

    class View {
        private $smarty;
        function __construct()
        {
            $this->smarty = new Smarty();
        }

        function showHome($personas, $ciudades){
            $this->smarty->assign('ciudades',$ciudades);
            $this->smarty->assign('personas',$personas);
            $this->smarty->display('./templates/home.tpl');
        }

        function formNuevaPersona($ciudades){
            $this->smarty->assign('ciudades',$ciudades);
            $this->smarty->display('./templates/formNuevaPersona.tpl');
        }

        function showHomeLocation(){
            header("Location: ".BASE_URL."home");
        }

        function formModPersona($persona,$ciudades) {
            $this->smarty->assign('persona',$persona);
            $this->smarty->assign('ciudades',$ciudades);
            $this->smarty->display('./templates/formModPersona.tpl');
        }

        function mostrarPaginaPersonal($persona,$telefonos) {
            $this->smarty->assign('persona',$persona);
            $this->smarty->assign('telefonos',$telefonos);
            $this->smarty->display('./templates/paginaPersonal.tpl');
        }
    }