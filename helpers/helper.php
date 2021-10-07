<?php

class Helper {
    function __construct()
    {
        
    }

    function checkAdmin () {
        session_start();
        if ($_SESSION['logged']){
            if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin') { return true;}
            else {return false;}
        }
        else { return false;}
    }

    function isLogged() {
        session_start();
        if ( isset($_SESSION['logged'])){ return true;}
            else {return false;}
    }
    
    function getProps(){
        session_start();
        if (isset($_SESSION['logged'],$_SESSION['rol'])){ return [$_SESSION['usuario'],$_SESSION['rol']];}
        else {return false;}
    }    
}