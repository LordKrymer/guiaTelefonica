<?php
    include_once "./libs/smarty-3.1.39/libs/Smarty.class.php";
    include_once "./helpers/helper.php";
    class View {
        private $smarty;
        private $helper;

        function __construct()
        {
            $this->smarty = new Smarty();
            $this->helper = new Helper();
        }

        function armarFooter(){
            $nombre = $this->helper->getProps();
            if ($nombre){
                $this->smarty->assign('nombre',$nombre[0]);
                $this->smarty->assign('logged',true);
                $this->smarty->assign('rol',$nombre[1]);
                return $nombre[1];
            }
            else{$this->smarty->assign('logged',false);
                $this->smarty->assign('nombre',"ANONIMO");}
                $this->smarty->assign('rol','visitante');
                return 'visitante';
        }

        function showHome($personas, $ciudades){
            
            $this->smarty->assign('ciudades',$ciudades);
            $this->smarty->assign('personas',$personas);
            $rol = $this->armarFooter();
            $this->smarty->assign('rol',$rol);
            $this->smarty->display('./templates/home.tpl');
        }

        function formNuevaPersona($ciudades){
            $this->smarty->assign('ciudades',$ciudades);
            $this->armarFooter();
            $this->smarty->display('./templates/formNuevaPersona.tpl');
        }
        

        function showHomeLocation(){
            header("Location: ".BASE_URL."home");
        }

        function formModPersona($persona,$ciudades) {
            $this->smarty->assign('persona',$persona);
            $this->smarty->assign('ciudades',$ciudades);
            $this->armarFooter();
            $this->smarty->display('./templates/ModPersona.tpl');
        }

        function mostrarPaginaPersonal($persona,$telefonos) {
            $this->smarty->assign('persona',$persona);
            $this->smarty->assign('telefonos',$telefonos);
            $rol = $this->armarFooter();
            $this->smarty->assign('rol',$rol);
            $this->smarty->display('./templates/paginaPersonal.tpl');
        }

        function formsAgregar($personas,$ciudades){
            $this->smarty->assign('personas',$personas);
            $this->smarty->assign('ciudades',$ciudades);
            $this->armarFooter();
            $this->smarty->display('./templates/formsAdmAgregar.tpl');
        }

        function formModTelefono($personas,$id){
            $this->smarty->assign('personas', $personas);
            $this->smarty->assign('id',$id);
            $this->armarFooter();
            $this->smarty->display('./templates/formModTelefono.tpl');
        }

        function showLoginForm(){
            $this->smarty->assign("action","login");
            $this->smarty->assign('envio', 'iniciar sesion');
            $this->armarFooter();
            $this->smarty->display('./templates/loginForm.tpl');
        }

        function formRegistro($cartel = ''){
            $this->smarty->assign("action","registrar");
            $this->smarty->assign('envio', 'Registrar');
            $this->smarty->assign('cartel', $cartel);
            $this->armarFooter();
            $this->smarty->display('./templates/loginForm.tpl');
        }
    }