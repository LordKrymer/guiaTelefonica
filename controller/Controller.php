<?php
    require_once "./Model/Model.php";
    require_once "./View/View.php";
    require_once "./Model/userModel.php";
    require_once "./helpers/helper.php";

    class Controller{
        private $model;
        private $view;
        private $userModel;
        private $helper;

        function __construct()
        {
            $this->model = new Model();
            $this->view = new View();
            $this->userModel = new userModel();
            $this->helper = new Helper();
        }

        function showHomeLocation(){
            $this->view->showHomeLocation();
        }

        function showHome()
        {
            $personas = $this->model->traerPersonas();
            $ciudades = $this->model->traerCiudades();
            $this->view->showHome($personas,$ciudades);
        }

        function nuevaPersona (){
            if (isset($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad'])){
                if (! $this->model->traerPersona($_POST['DNI'])){
                $this->model->nuevaPersona($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad']);
                }
                $this->view->showHomeLocation();}
                
            else {$this->view->showHomeLocation();}
        }
        function formNuevaPersona(){
            if ($this->helper->checkAdmin()){
                $ciudades = $this->model->traerCiudades();
                $this->view->formNuevaPersona($ciudades);}
            else {$this->view->showHomeLocation();}
        }

        function paginaPersonal($DNI){
            $persona = $this->model->traerPersona($DNI);
            $telefonos = $this->model->traerTelefonos($DNI);
            $this->view->mostrarPaginaPersonal($persona,$telefonos);
        }
        
        function borrarPersona($DNI){
            if ($this->helper->checkAdmin()){
                if ($this->model->traerPersona($DNI))/* ENTONCES */ $this->model->borrarPersona($DNI);
                $this->view->showHomeLocation();}
            else {$this->view->showHomeLocation();}
        }

        function borrarTelefono($id){
            if ($this->helper->checkAdmin()){
                $this->model->borrarTelefono($id);
                $this->view->showHomeLocation();}
            else {$this->view->showHomeLocation();}
        }
        
        function formModPersona($DNI){
            if ($this->helper->checkAdmin()){
                $ciudades = $this->model->traerCiudades();
                $persona = $this->model->traerPersona($DNI);
                $this->view->formModPersona($persona, $ciudades);}
            else {$this->view->showHomeLocation();}
            
        }

        function editarPersona(){
            if (isset($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad'])){
            $this->model->editarPersona($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad']);
            $this->view->showHomeLocation();}
            else{$this->view->showHomeLocation();}
        }

        function filtrarCiudad (){
            if (isset($_GET["ciudad"])){
            $personas = $this->model->personasPorCiudad($_GET["ciudad"]);
            $ciudades = $this->model->traerCiudades();
            $this->view->showHome($personas,$ciudades);}
            else {$this->view->showHomeLocation();}
        }

        function formsAgregar(){
            if ($this->helper->checkAdmin()){
                $ciudades = $this->model->traerCiudades();
                $personas = $this->model->traerPersonas();
                $this->view->formsAgregar($personas,$ciudades);}
            else {$this->view->showHomeLocation();}
        }

        function nuevoTelefono(){
            if (isset($_POST['propietario'],$_POST['caracteristica'],$_POST['telefono'],$_POST['compania'])) {
            $this->model->nuevoTelefono($_POST['propietario'],$_POST['caracteristica'],$_POST['telefono'],$_POST['compania']);
            $this->view->showHomeLocation();}
            else {$this->view->showHomeLocation();}
        }

        function formModTelefono($id){
            if ($this->helper->checkAdmin()){
                $personas= $this->model->traerPersonas();
                $this->view->formModTelefono($personas,$id);}
            else {$this->view->showHomeLocation();}
        }

        function modificarTelefono (){
            if(isset($_POST['id'],$_POST['caracteristica'],$_POST['telefono'],$_POST['compania'], $_POST['propietario'])){
            $this->model->modificarTelefono($_POST['id'],$_POST['caracteristica'],$_POST['telefono'],$_POST['compania'], $_POST['propietario']);
            $this->view->showHomeLocation();}
            else{$this->view->showHomeLocation();}
        }

        function login($nombre,$password){
            $this->userModel->iniciarSesion($nombre,$password);
            $this->view->showHomeLocation();
        }

        function showLoginForm (){
            if ($this->helper->isLogged()){ $this->view->showHomeLocation();}
            else{
                $this->view->showLoginForm();}
        }

        function registrar ($nombre,$password) {
            $cartel = $this->userModel->nuevoUsuario($nombre,$password);
            $this->view->formRegistro($cartel);
        }

        function showRegisterForm () {
            $this->view->formRegistro();
        }

        function logout () {
            $this->userModel->logout();
            $this->view->showHomeLocation();
        }

        function upgradeUser($nombre){
            $mensaje = $this->userModel->upgradeUser($nombre);
            $usuarios = $this->userModel->traerUsuarios();
            $this->view->upgradeUserForm($usuarios,$mensaje);
        }

        function showUpgradeForm(){
            $usuarios = $this->userModel->traerUsuarios();
            $this->view->upgradeUserForm($usuarios);
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

        function superUser(){
            if ($this->helper->checkAdmin()){
                if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                    if (isset($_POST['user'])){
                        $this->upgradeUser($_POST['user']);}
                    else{$this->showHomeLocation();}
                }
                elseif($_SERVER['REQUEST_METHOD'] === 'GET'){
                    $this->ShowUpgradeForm();
                }
            }
            else{$this->showHomeLocation();}
        }
    }