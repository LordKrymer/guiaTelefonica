<?php
    require_once "./Model/Model.php";
    require_once "./View/View.php";
    require_once "./Model/userModel.php";

    class Controller{
        private $model;
        private $view;
        private $userModel;

        function __construct()
        {
            $this->model = new Model();
            $this->view = new View();
            $this->userModel = new userModel();
        }
        function showHome()
        {
            $personas = $this->model->traerPersonas();
            $this->view->showHome($personas);
        }

        function nuevaPersona ( $DNI, $nombre , $apellido, $ciudad){
            if (! $this->model->traerPersona($DNI)){
            $this->model->nuevaPersona( $DNI, $nombre , $apellido, $ciudad);
            }
        }
        function formNuevaPersona(){
            $ciudades = $this->model->traerCiudades();
            $this->view->formNuevaPersona($ciudades);
        }

        function paginaPersonal($DNI){
            $persona = $this->model->traerPersona($DNI);
            $telefonos = $this->model->traerTelefonos($DNI);
            $this->view->mostrarPaginaPersonal($persona,$telefonos);
        }
        
        function borrarPersona($DNI){
            if ($this->model->traerPersona($DNI))/* ENTONCES */ $this->model->borrarPersona($DNI);
            $this->view->showHomeLocation();
        }

        function borrarTelefono($id){
            $this->model->borrarTelefono($id);
        }
        
        function formModPersona($DNI){
            $ciudades = $this->model->traerCiudades();
            $persona = $this->model->traerPersona($DNI);
            $this->view->formModPersona($persona, $ciudades);
        }

        function editarPersona($DNI, $nombre , $apellido, $ciudad){
            $this->model->editarPersona($DNI, $nombre , $apellido, $ciudad);
            $this->view->showHomeLocation();
        }

    }