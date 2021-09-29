<?php
    require_once "./Model/Model.php";
    require_once "./View/View.php";

    class Controller{
        private $model;
        private $view;

        function __construct()
        {
            $this->model = new Model();
            $this->view = new View();
        }
        function showHome()
        {
            $personas = $this->model->traerPersonas();
            $this->view->showHome($personas);
        }

        function nuevaPersona ( $DNI, $nombre , $apellido, $ciudad){
            if (! $this->model->traerPersona($DNI)){
            $this->model->agregarPersona( $DNI, $nombre , $apellido, $ciudad);
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
            $this->model->borrarPersona($DNI);
        }

        function borrarTelefono($id){
            $this->model->borrarTelefono($id);
        }

        function editarPersona(){
            $this->model->editarPersona();
        }

    }