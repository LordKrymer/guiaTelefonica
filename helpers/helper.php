<?php

class Helper {
    function __construct()
    {
        
    }

    function checkAdmin () {
        session_start();
        if ($_SESSION['logged']){
            if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin') { session_abort(); return true;}
            else { session_abort();return false;}
        }
        else { session_abort(); return false;}
    }

    function isLogged() {
        session_start();
        if ( isset($_SESSION['logged'])){ session_abort(); return true;}
            else {  session_abort();return false;}

    }
    
    function getProps(){
        session_start();
        if (isset($_SESSION['logged'],$_SESSION['rol'])){ session_abort(); return [$_SESSION['usuario'],$_SESSION['rol']];}
        else  {  session_abort();return ["anonimo","user"];}
    }    
}