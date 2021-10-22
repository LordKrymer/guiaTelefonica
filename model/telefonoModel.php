<?php

class TelefonoModel {
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=guiaTelefonica;charset=utf8', 'root', '');
    }

    //Operacion auxiliar
    function traerCiudades(){
        $sentencia= $this->db->prepare("SELECT * FROM ciudades");
        $sentencia->execute();
        $ciudades = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $ciudades;
    }

    function existeTelefono($DNI,$caracteristica,$telefono,$compania){
        $sentencia= $this->db->prepare("SELECT * FROM telefonos WHERE DNI_fk=? AND caracteristica =? AND telefono=? AND compania=?;");
        $sentencia->execute([$DNI,$caracteristica,$telefono,$compania]);
        $telefono = $sentencia->fetch(PDO::FETCH_OBJ);
        if ($telefono){ return true;} else { return false;}
    }

    function nuevoTelefono($DNI,$caracteristica,$telefono,$compania){
        if (! $this->existeTelefono($DNI,$caracteristica,$telefono,$compania)){
            $sentencia = $this->db->prepare("INSERT INTO telefonos (DNI_fk, compania, caracteristica, telefono) VALUES (?,?,?,?)");
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

    function modificarTelefono($id,$caracteristica,$telefono,$compania, $propietario){
        if ($this->traerTelefono( (int) $id)){
            $sentencia = $this->db->prepare("UPDATE telefonos
            SET caracteristica = ? ,telefono=? ,compania=?, DNI_fk=? 
            WHERE id_telefono = ?;");
            $sentencia->execute(array($caracteristica,$telefono,$compania, $propietario, (int) $id));
        }
    }
}