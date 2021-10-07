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

        function nuevaPersona ( $DNI, $nombre , $apellido, $ciudad){
            if (! $this->model->traerPersona($DNI)){
            $this->model->nuevaPersona( $DNI, $nombre , $apellido, $ciudad);
            }
            $this->view->showHomeLocation();
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

        function editarPersona($DNI, $nombre , $apellido, $ciudad){
            $this->model->editarPersona($DNI, $nombre , $apellido, $ciudad);
            $this->view->showHomeLocation();
        }

        function filtrarCiudad ($ciudad){
            $personas = $this->model->personasPorCiudad($ciudad);
            $ciudades = $this->model->traerCiudades();
            $this->view->showHome($personas,$ciudades);
        }

        function formsAgregar(){
            if ($this->helper->checkAdmin()){
                $ciudades = $this->model->traerCiudades();
                $personas = $this->model->traerPersonas();
                $this->view->formsAgregar($personas,$ciudades);}
            else {$this->view->showHomeLocation();}
        }

        function nuevoTelefono($propietario,$caracteristica,$telefono,$compania){
            $this->model->nuevoTelefono($propietario,$caracteristica,$telefono,$compania);
            $this->view->showHomeLocation();
        }

        function formModTelefono($id){
            if ($this->helper->checkAdmin()){
                $personas= $this->model->traerPersonas();
                $this->view->formModTelefono($personas,$id);}
            else {$this->view->showHomeLocation();}
        }

        function modificarTelefono ($id,$caracteristica,$telefono,$compania, $propietario){
            $this->model->modificarTelefono($id,$caracteristica,$telefono,$compania, $propietario);
            $this->view->showHomeLocation();
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

        function upgradeUser(){
            
        }
    }