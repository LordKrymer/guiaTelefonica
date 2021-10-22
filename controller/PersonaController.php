<?php
    require_once "./Model/telefonoModel.php";
    require_once "./Model/personaModel.php";
    require_once "./View/View.php";
    require_once "./Model/userModel.php";
    require_once "./helpers/helper.php";

    class PersonaController{
        private $personaModel;
        private $telefonoModel;
        private $view;
        private $userModel;
        private $helper;

        function __construct()
        {
            $this->personaModel = new PersonaModel();
            $this->telefonoModel = new TelefonoModel();
            $this->view = new View();
            $this->userModel = new userModel();
            $this->helper = new Helper();
        }
// Funciones Generales
        function showHomeLocation(){
            $this->view->showHomeLocation();
        }

        function showHome($params)
        {
            if (isset($params[1])){
                $this->showHomeLocation();
            }
            else{
                $personas = $this->personaModel->traerPersonas();
                $ciudades = $this->personaModel->traerCiudades();
                $props = $this->helper->getProps();
                $this->view->showHome($personas,$ciudades,$props);}
        }
        //Funciones Personas
        function nuevaPersona (){
            $props = $this->helper->getProps();
            if (isset($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad'])){
                if (! $this->personaModel->traerPersona($_POST['DNI'])){
                $this->personaModel->nuevaPersona($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad']);
                }
                $this->view->showHomeLocation();}
                
            else {$this->view->showHomeLocation();}
        }
        function formNuevaPersona(){
            $props = $this->helper->getProps();
            if ($this->helper->checkAdmin()){
                $ciudades = $this->personaModel->traerCiudades();
                $this->view->formNuevaPersona($ciudades,$props);}
            else {$this->view->showHomeLocation();}
        }

        function paginaPersonal($DNI){
            $props = $this->helper->getProps();
            $persona = $this->personaModel->traerPersona($DNI);
            $telefonos = $this->telefonoModel->traerTelefonos($DNI);
            $this->view->mostrarPaginaPersonal($persona,$telefonos,$props);
        }
        
        function borrarPersona($DNI){
            $props = $this->helper->getProps();
            if ($this->helper->checkAdmin()){
                if ($this->personaModel->traerPersona($DNI))/* ENTONCES */ $this->model->borrarPersona($DNI);
                $this->view->showHomeLocation();}
            else {$this->view->showHomeLocation();}
        }
        function formModPersona($DNI){
            $props = $this->helper->getProps();
            if ($this->helper->checkAdmin()){
                $ciudades = $this->personaModel->traerCiudades();
                $persona = $this->personaModel->traerPersona($DNI);
                $this->view->formModPersona($persona, $ciudades,$props);}
            else {$this->view->showHomeLocation();}
            
        }
        function editarPersona(){
            $props = $this->helper->getProps();
            if (isset($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad'])){
            $this->personaModel->editarPersona($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad']);
            $this->view->showHomeLocation();}
            else{$this->view->showHomeLocation();}
        }
        
        function filtrarCiudad (){
            $props = $this->helper->getProps();
            if (isset($_GET["ciudad"])){
            $personas = $this->personaModel->personasPorCiudad($_GET["ciudad"]);
            $ciudades = $this->personaModel->traerCiudades();
            $this->view->showHome($personas,$ciudades,$props);}
            else {$this->view->showHomeLocation();}
        }
    }