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

    function upgradeUser ($nombre){
        $sentencia= $this->db->prepare("UPDATE usuarios
        SET rol='admin' WHERE nombre = ?;");
        try{
            $sentencia->execute(array($nombre));
            return "Ascendido";
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

    function logout(){
        session_start();
        session_destroy();
    }

    }