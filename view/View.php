<?php
    include_once "./libs/smarty-3.1.39/libs/Smarty.class.php";
    class View {
        private $smarty;

        function __construct()
        {
            $this->smarty = new Smarty();
        }

        function armarFooter($props){
            if ($props){
                if ($props[0]=='anonimo'){
                    {$this->smarty->assign('logged',false);
                    $this->smarty->assign('nombre',"ANONIMO");}
                    $this->smarty->assign('rol','visitante');}
                else{
                    $this->smarty->assign('nombre',$props[0]);
                    $this->smarty->assign('logged',true);
                    $this->smarty->assign('rol',$props[1]);}
            }
        }

        function showHomeLocation(){
            header("Location: ".BASE_URL."home");
        }
        
        //ViewPersonas
        function showHome($personas, $ciudades, $props){
            $this->smarty->assign('ciudades',$ciudades);
            $this->smarty->assign('personas',$personas);
            $this->armarFooter($props);
            $rol = $props[1];
            $this->smarty->assign('rol',$rol);
            $this->smarty->display('./templates/home.tpl');
        }

        function formNuevaPersona($ciudades,$props){
            $this->smarty->assign('ciudades',$ciudades);
            $this->armarFooter($props);
            $this->smarty->display('./templates/formNuevaPersona.tpl');
        }
        
        function formModPersona($persona,$ciudades,$props) {
            $this->smarty->assign('persona',$persona);
            $this->smarty->assign('ciudades',$ciudades);
            $this->armarFooter($props);
            $this->smarty->display('./templates/ModPersona.tpl');
        }

        function mostrarPaginaPersonal($persona,$telefonos,$props) {
            $this->smarty->assign('persona',$persona);
            $this->smarty->assign('telefonos',$telefonos);
            $this->armarFooter($props);
            $rol = $props[1];
            $this->smarty->assign('rol',$rol);
            $this->smarty->display('./templates/paginaPersonal.tpl');
        }

        function formsAgregar($personas,$ciudades,$props){
            $this->smarty->assign('personas',$personas);
            $this->smarty->assign('ciudades',$ciudades);
            $this->armarFooter($props);
            $this->smarty->display('./templates/formsAdmAgregar.tpl');
        }
        //viewTelefonos
        function formModTelefono($personas,$id,$props){
            $this->smarty->assign('personas', $personas);
            $this->smarty->assign('id',$id);
            $this->armarFooter($props);
            $this->smarty->display('./templates/formModTelefono.tpl');
        }
        //View Users
        function showLoginForm($props){
            $this->smarty->assign("action","login");
            $this->smarty->assign('envio', 'iniciar sesion');
            $this->armarFooter($props);
            $this->smarty->display('./templates/loginForm.tpl');
        }

        function formRegistro($cartel = '',$props){
            $this->smarty->assign("action","registrar");
            $this->smarty->assign('envio', 'Registrar');
            $this->smarty->assign('cartel', $cartel);
            $this->armarFooter($props);
            $this->smarty->display('./templates/loginForm.tpl');
        }

        function upgradeUserForm($usuarios,$mensaje = '',$props){
            $this->smarty->assign('usuarios',$usuarios);
            $this->smarty->assign('mensaje',$mensaje);
            $this->armarFooter($props);
            $this->smarty->display('./templates/upgradeUser.tpl');
        }
    }