<?php

class ComentarioModel {
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=guiaTelefonica;charset=utf8', 'root', '');
    }

    function traerComentarios($params = null){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    function comentariosXPersona($DNI){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE fk_DNI_persona = ?");
        $sentencia->execute([$DNI]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function comentarioEspecifico($ID){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id = ?");
        $sentencia->execute([$ID]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function crearComentario($persona,$contenido,$usuario, $calificacion){
        $sentencia = $this->db->prepare("INSERT INTO `comentarios` (`contenido`, `fk_DNI_persona`, `fk_nombre_user`, `Fecha`, `calificacion`) VALUES (?,?,?,?,?);");
        $sentencia->execute([$contenido,$persona,$usuario,date("Y-m-d"),$calificacion]);
        $id = $this->db->lastInsertId();
        return $id;
    }

    function eliminarComentario($ID){
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id = ?");
        $sentencia->execute([$ID]);
    }

    function editarComentario($ID,$contenido){
        $sentencia = $this->db->prepare("UPDATE comentarios SET contenido = ? WHERE id = ?");
        $sentencia->execute([$contenido,$ID]);
    }
    
}