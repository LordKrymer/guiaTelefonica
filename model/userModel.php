<?php
    class userModel {
        private $db;

        function __construct()
        {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=guiaTelefonica;charset=utf8', 'root', '');
        }

            // OPERACIONES USUARIOS
    function nuevoUsuario ($nombre, $password){
        $userPassword = password_hash($password, PASSWORD_BCRYPT);
        if(!empty($nombre)){
            try{
            $sentencia = $this->db->prepare('INSERT INTO usuarios (nombre, password) VALUES (? , ?)');
            $sentencia->execute(array($nombre,$userPassword));
            return 'usuario registrado exitosamente';}
            catch(Throwable $th){return "Usuario ya existente";}}
        else{return "Nombre vacio, intente de nuevo";}
    }

    function cambiarRol ($nombre, $rol){
        $sentencia= $this->db->prepare("UPDATE usuarios
        SET rol= ? WHERE nombre = ?;");
        try{
            $sentencia->execute(array($rol,$nombre));
            return "Rol de $nombre \n Modificado a $rol";
        }
        catch(Throwable $th){ return "ERROR id invalido";}

    }

    function traerUsuarios(){
        $sentencia= $this->db->prepare("SELECT * FROM usuarios");
        $sentencia->execute();
        $users = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    
    function iniciarSesion($nombre,$password){
        $sentencia = $this->db->prepare('SELECT * FROM usuarios WHERE nombre = ?');
        $sentencia->execute(array($nombre));
        $user = $sentencia->fetch(PDO::FETCH_OBJ);
        if($user && password_verify($password,($user->password))){
            session_start();
            $_SESSION["logged"] = true; //sesion iniciada
            $_SESSION["usuario"] = $user->nombre;
            if (isset($user->rol) ){
                $_SESSION["rol"] = $user->rol;
            }
        };
    }

    function eliminarUsuario($nombre){
        try{
            $sentencia = $this->db->prepare('DELETE FROM usuarios WHERE nombre = ?');
            $sentencia->execute(array($nombre));
            return "Usuario $nombre eliminado";
        }
        catch(Throwable $th){return "ERROR id invalido";}
    }
    function logout(){
        session_start();
        session_destroy();
    }

    }