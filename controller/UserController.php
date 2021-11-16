<?php
    require_once "./View/View.php";
    require_once "./Model/userModel.php";
    require_once "./helpers/helper.php";

    class UserController{
        private $model;
        private $view;
        private $userModel;
        private $helper;

        function __construct()
        {
            $this->model = new UserModel();
            $this->view = new View();
            $this->userModel = new userModel();
            $this->helper = new Helper();
        }
// Funciones Generales
        function showHomeLocation(){
            $this->view->showHomeLocation();
        }

        function login($nombre,$password){
            $this->userModel->iniciarSesion($nombre,$password);
            $this->view->showHomeLocation();
        }

        function showLoginForm (){
            $props = $this->helper->getProps();
            if ($this->helper->isLogged()){ $this->view->showHomeLocation();}
            else{
                $this->view->showLoginForm($props);}
        }

        function registrar ($nombre,$password) {
            $props = $this->helper->getProps();
            $cartel = $this->userModel->nuevoUsuario($nombre,$password);
            $this->view->formRegistro($cartel,$props);
        }

        function showRegisterForm () {
            $props = $this->helper->getProps();
            $this->view->formRegistro(NULL,$props);
        }

        function logout () {
            $this->userModel->logout();
            $this->view->showHomeLocation();
        }

        function cambiarRol($nombre,$rol){
            $props = $this->helper->getProps();
            $mensaje = $this->userModel->cambiarRol($nombre,$rol);
            $usuarios = $this->userModel->traerUsuarios();
            $this->view->upgradeUserForm($usuarios,$mensaje,$props);
        }

        function showUpgradeForm(){
            $props = $this->helper->getProps();
            $usuarios = $this->userModel->traerUsuarios();
            $this->view->upgradeUserForm($usuarios,NULL,$props);
        }

        function registro() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                if (isset($_POST['nombre'],$_POST['password'])){
                    $this->registrar($_POST['nombre'],$_POST['password']);}
                else{$this->showHomeLocation();}
            }
            elseif($_SERVER['REQUEST_METHOD'] === 'GET'){
                $this->ShowRegisterForm();
            }
        }

        function logeo() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                if (isset($_POST['nombre'],$_POST['password'])){
                    $this->login($_POST['nombre'],$_POST['password']);}
                else{$this->showHomeLocation();}
            }
            elseif($_SERVER['REQUEST_METHOD'] === 'GET'){
                $this->ShowLoginForm();
            }
        }


        function superUser($params = null){
            if ($this->helper->checkAdmin()){
                if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                    if (isset($_POST['user'],$_POST['rol'])){
                        $this->cambiarRol($_POST['user'],$_POST['rol']);}
                    else{$this->showHomeLocation();}
                }
                elseif($_SERVER['REQUEST_METHOD'] === 'GET'){
                    $this->ShowUpgradeForm();
                }
            }
            else{$this->showHomeLocation();}
        }

        function eliminarUsuario($nombre){
            if ($this->helper->checkAdmin()){
                $this->userModel->eliminarUsuario($nombre);
                $this->view->showHomeLocation();
            }
            else{$this->showHomeLocation();}
        }
    }