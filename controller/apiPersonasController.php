<?php

include_once './model/personaModel.php';
include_once './view/apiView.php';


class apiPersonasController {

    private $model;
    private $view;
    function __construct()
    {
        $this->model = new personaModel();
        $this->view = new ApiView();
    }

    function traerPersonas($params = null) {
        echo "hola";
        try{
            $personas = $this->model->traerPersonas();
            if(!empty($personas)){
                $this->view->response($personas, 200);}
            else{
                $this->view->response("No hay personas", 404);
            }
        }
        catch(Throwable $t){
            $this->view->response($t->getMessage(), 500);}
    }

    function traerPersona($params = null) {
        $persona = $this->model->traerPersona($params[':ID']);
        $this->view->response($persona, 200);
    }

}