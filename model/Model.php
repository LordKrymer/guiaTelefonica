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
        if(! $this->traerPersona($DNI)){
            $sentencia = $this->db->prepare("INSERT INTO personas VALUES (?,?,?,?)");
            $sentencia->execute(array($DNI,$nombre,$apellido,$ciudad));
        }
    }
    
    
    function borrarPersona($DNI){
        if ($this->traerPersona($DNI)){
            $sentencia = $this->db->prepare("DELETE FROM personas WHERE DNI = ?;");
            $sentencia->execute(array($DNI));
        }
    }
    
    function editarPersona($DNI, $nombre , $apellido, $ciudad){
        if ($this->traerPersona($DNI)){
            $sentencia = $this->db->prepare("UPDATE personas
            SET nombre = ? ,apellido=? ,postal_fk=? 
            WHERE DNI = ?");
            $sentencia->execute(array($nombre,$apellido,$ciudad,$DNI));
        }
    }
    
    // OPERACIONES TELEFONOS
    function existeTelefono($DNI,$caracteristica,$telefono,$compania){
        $sentencia= $this->db->prepare("SELECT * FROM telefonos WHERE DNI_fk=?, caracteristica =?, telefono=?, compania=?;");
        $sentencia->execute([$DNI,$caracteristica,$telefono,$compania]);
        $telefono = $sentencia->fetch(PDO::FETCH_OBJ);
        if ($telefono){ return true;} else { return false;}
    }

    function nuevoTelefono($DNI,$caracteristica,$telefono,$compania){
        if (! $this->existeTelefono($DNI,$caracteristica,$telefono,$compania)){
            $sentencia = $this->db->prepare("INSERT INTO telefonos VALUES (?,?,?,?)");
            $sentencia->execute(array($DNI,$compania,$caracteristica,$telefono));
        }
    }

    function traerTelefonos($DNI){  // ARRAY TELEFONOS
        $sentencia= $this->db->prepare("SELECT * FROM telefonos WHERE DNI_fk=?");
        $sentencia->execute(array($DNI));
        $telefonos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $telefonos;
    }

    function traerTelefono($id){  // Telefono unico
        $sentencia= $this->db->prepare("SELECT * FROM telefonos WHERE id_telefono=?");
        $sentencia->execute(array($id));
        $telefono = $sentencia->fetch(PDO::FETCH_OBJ);
        return $telefono;
    }

    
    function borrarTelefono($id){
        if ($this->traerTelefono($id)){       
            $sentencia = $this->db->prepare("DELETE FROM telefonos WHERE id_telefono = ?;");
            $sentencia->execute(array($id));
        }
    }

    function editarTelefono($id,$caracteristica,$telefono,$compania){
        if ($this->traerTelefono($id)){
            $sentencia = $this->db->prepare("UPDATE telefonos
            SET caracteristica = ? ,telefono=? ,compania=? , 
            WHERE id_telefono = ?;");
            $sentencia->execute(array($caracteristica,$telefono,$compania,$id));
        }
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
    
}