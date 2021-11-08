<?php

include_once './model/comentarioModel.php';
include_once './view/apiView.php';


class apiComentariosController {

    private $model;
    private $view;
    function __construct()
    {
        $this->model = new comentarioModel();
        $this->view = new ApiView();
    }


    function traerComentarios($params = null)
    {
        $comentarios = $this->model->traerComentarios();
        $this->view->response($comentarios, 200);
    }
    
    function traerComentario($params = null)
    {
        $comentario = $this->model->comentarioEspecifico($params[':ID']);
        $this->view->response($comentario, 200);
    }

    function comentariosXPersona($params = null)
    {
        $comentarios = $this->model->comentariosXPersona($params[':DNI']);
        $this->view->response($comentarios, 200);
    }

    function crearComentario($params = null)
    {
        $body = $this->getBody();
        if ($body){
            if ($body->calificacion <5 && $body->calificacion >0){
                $id = $this->model->crearComentario($body->DNI, $body->contenido, $body->user, $body->calificacion);
                if ($id){
                    $this->view->response("asdasdasd", 200);
                }else{
                    $this->view->response("No se pudo crear el comentario", 500);
                }
            }
        }
        else{
            $this->view->response($body, 500);
        }
    }

    function getBody()
    {
        $body = file_get_contents('php://input' , true);
        return json_decode($body);
    }

    function eliminarComentario($params = null)
    {
        $id = $params[':ID'];
        $this->model->eliminarComentario($id);
    }
}