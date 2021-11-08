<?php

class PersonaModel {
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

    function traerPersonas(){    //ARRAY PERSONAS
        $sentencia = $this->db->prepare(" SELECT personas.DNI, ciudades.nombre_ciudad, personas.nombre, personas.apellido
        FROM personas
        INNER JOIN ciudades ON personas.postal_fk=ciudades.postal;");
        $sentencia->execute();
        $personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $personas;
    }
    
    function traerPersona($DNI){   //UNICA PERSONA
        $sentencia= $this->db->prepare("SELECT personas.DNI, ciudades.nombre_ciudad, personas.nombre, personas.apellido, personas.postal_fk
        FROM personas
        INNER JOIN ciudades ON personas.postal_fk=ciudades.postal
        WHERE DNI= ?
        ");
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

    function personasPorCiudad($ciudad){
        $sentencia= $this->db->prepare("SELECT personas.DNI, ciudades.nombre_ciudad, personas.nombre, personas.apellido
        FROM personas
        INNER JOIN ciudades ON personas.postal_fk=ciudades.postal
        WHERE postal_fk= ?
        ");
        $sentencia->execute( array((int) $ciudad));
        $personas= $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $personas;
    }
    
    function getCantPersonas(){
        $sentencia = $this->db->prepare("SELECT * FROM personas");
        $sentencia->execute();
        $personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return count($personas);
    }

    function personasPorPagina($pagina, $personasXPagina){
        $sentencia = $this->db->prepare("SELECT personas.DNI, ciudades.nombre_ciudad, personas.nombre, personas.apellido
        FROM personas
        INNER JOIN ciudades ON personas.postal_fk=ciudades.postal
        LIMIT ?,?
        ");
        $sentencia->execute(array(($pagina-1)*$personasXPagina,$personasXPagina));
        $personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $personas;
    }


}