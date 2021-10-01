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
        $sentencia = $this->db->prepare('INSERT INTO usuarios (nombre, password) VALUES (? , ?)');
        $sentencia->execute(array($nombre,$userPassword));
    }
    
    function iniciarSesion($nombre,$password){
        $sentencia = $this->db->prepare('SELECT * FROM usuarios WHERE nombre = ?');
        $sentencia->execute(array($nombre));
        $user = $sentencia->fetch(PDO::FETCH_OBJ);
        if($user && password_verify($password,($user->password))){
            session_start();
            $_SESSION["logged"] = true; //sesion iniciada
            $_SESSION["usuario"] = $user->nombre;
            if (isset($user->rol)){
                $_SESSION["isAdmin"] = true;
            }
            /* COMPLETAR */
        };
    }

    }