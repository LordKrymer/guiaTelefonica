<?php

include_once './model/telefonoModel.php';
include_once './view/apiView.php';


class apiTelefonosController {

    private $model;
    private $view;
    function __construct()
    {
        $this->model = new TelefonoModel();
        $this->view = new apiView();
    }

    function traerTelefonos($params = null)
    {
        try{
            if (isset($params[":DNI"])){
                $telefonos = $this->model->traerTelefonos($params[":DNI"]);
            }
            else{
                $telefonos = $this->model->_traerTelefonos();
            }
            $this->view->response($telefonos, 200);
        }
        catch(Exception $e){
            $this->view->response($e->getMessage(), 500);
        }
    }
    
    function traerTelefono($params = null)
    {
        try{
            $telefono = $this->model->traerTelefono($params[":ID"]);
            $this->view->response($telefono, 200);
        }
        catch(Exception $e){
            $this->view->response($e->getMessage(), 500);
        }
    }
}