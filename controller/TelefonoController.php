<?php
    require_once "./View/View.php";
    require_once "./Model/userModel.php";
    require_once "./helpers/helper.php";

    class TelefonoController{
        private $model;
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

        function borrarTelefono($id){
            $props = $this->helper->getProps();
            if ($this->helper->checkAdmin()){
                $this->telefonoModel->borrarTelefono($id);
                $this->view->showHomeLocation();}
            else {$this->view->showHomeLocation();}
        }
        


        function formsAgregar(){
            $props = $this->helper->getProps();
            if ($this->helper->checkAdmin()){
                $ciudades = $this->telefonoModel->traerCiudades();
                $personas = $this->personaModel->traerPersonas();
                $this->view->formsAgregar($personas,$ciudades,$props);}
            else {$this->view->showHomeLocation();}
        }

        function nuevoTelefono(){
            $props = $this->helper->getProps();
            if (isset($_POST['propietario'],$_POST['caracteristica'],$_POST['telefono'],$_POST['compania'])) {
            $this->telefonoModel->nuevoTelefono($_POST['propietario'],$_POST['caracteristica'],$_POST['telefono'],$_POST['compania']);
            $this->view->showHomeLocation();}
            else {$this->view->showHomeLocation();}
        }

        function formModTelefono($id){
            $props = $this->helper->getProps();
            if ($this->helper->checkAdmin()){
                $personas= $this->personaModel->traerPersonas();
                $this->view->formModTelefono($personas,$id,$props);}
            else {$this->view->showHomeLocation();}
        }

        function modificarTelefono (){
            if(isset($_POST['id'],$_POST['caracteristica'],$_POST['telefono'],$_POST['compania'], $_POST['propietario'])){
            $this->telefonoModel->modificarTelefono($_POST['id'],$_POST['caracteristica'],$_POST['telefono'],$_POST['compania'], $_POST['propietario']);
            $this->view->showHomeLocation();}
            else{$this->view->showHomeLocation();}
        }
    }