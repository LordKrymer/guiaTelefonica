<?php

class model {
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=guiaTelefonica;charset=utf8', 'root', '');
    }

    // OPERACIONES PERSONAS

    function traerPersonas(){    //ARRAY PERSONAS
        $sentencia = $this->db->prepare(" SELECT personas.DNI, ciudades.nombre_ciudad, personas.nombre, personas.apellido
        FROM personas
        INNER JOIN ciudades ON personas.postal_fk=ciudades.postal;");
        $sentencia->execute();
        $personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $personas;
    }
    
    function traerPersona($DNI){   //UNICA PERSONA
        $sentencia= $this->db->prepare("SELECT * FROM personas WHERE DNI=?");
        $sentencia->execute(array($DNI));
        $persona= $sentencia->fetch(PDO::FETCH_OBJ);
        return $persona;
    }

    function nuevaPersona ( $DNI, $nombre , $apellido, $ciudad){
        $sentencia = $this->db->prepare("INSERT INTO personas VALUES (?,?,?,?)");
        $sentencia->execute(array($DNI,$nombre,$apellido,$ciudad));
    }
    
    
    function borrarPersona($DNI){
        $sentencia = $this->db->prepare("DELETE FROM personas WHERE DNI = ?;");
        $sentencia->execute(array($DNI));
    }
    
    function editarPersona($DNI, $nombre , $apellido, $ciudad){
        $sentencia = $this->db->prepare("UPDATE personas
        SET nombre = ? ,apellido=? ,postal=? , 
        WHERE DNI = ?;");
        $sentencia->execute(array($nombre,$apellido,$ciudad,$DNI));
    }
    
    // OPERACIONES TELEFONOS
    function nuevoTelefono($DNI,$caracteristica,$telefono,$compania){
        $sentencia = $this->db->prepare("INSERT INTO telefonos VALUES (?,?,?,?)");
        $sentencia->execute(array($DNI,$compania,$caracteristica,$telefono));
    }

    function traerTelefonos($DNI){  // ARRAY TELEFONOS
        $sentencia= $this->db->prepare("SELECT * FROM telefonos WHERE DNI_fk=?");
        $sentencia->execute(array($DNI));
        $telefonos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $telefonos;
    }

    
    function borrarTelefono($id){
        $sentencia = $this->db->prepare("DELETE FROM telefonos WHERE id_telefono = ?;");
        $sentencia->execute(array($id));
    }
    
    
    
    //OPERACIONES CIUDADES
    function nuevaCiudad($nombre, $postal){
        $sentencia = $this->db->prepare("INSERT INTO ciudades VALUES (?,?)");
        $sentencia->execute(array($postal,$nombre));
    }

    function traerCiudades(){
        $sentencia= $this->db->prepare("SELECT * FROM ciudades");
        $sentencia->execute();
        $ciudades = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $ciudades;
    }
    
    // OPERACIONES USUARIOS
    function nuevoUsuario ($nombre, $password){
        $userPassword = password_hash($password, PASSWORD_BCRYPT);
        $sentencia = $this->db->prepare('INSERT INTO usuarios (nombre, password) VALUES (? , ?)');
        $sentencia->execute(array($nombre,$userPassword));
    }
    
    function iniciarSesion($nombre,$password){
        $sentencia = $this->db->prepare('SELECT * FROM usuarios WHERE nombre = ?');
        $sentencia->execute(array($nombre));
        $user = $sentencia->fetch(PDO::FETCH_OBJ);
        if($user && password_verify($password,($user->password))){
            session_start();

            /* COMPLETAR */
        };
    }
}