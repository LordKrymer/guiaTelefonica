<?php
include_once "libs/Router.php";
require_once "controller/PersonaController.php";
require_once "controller/TelefonoController.php";
require_once "controller/UserController.php";


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
$router = new Router();
$userController = new UserController();
$telefonoController = new TelefonoController();
$personaController = new PersonaController();

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
    $telefonoController->showHomeLocation();
}

$params = explode('/', $action);

$router->addRoute('eliminarFoto/:ID', "GET", "PersonaController", 'eliminarFoto');
$router->route($_GET['action'], $_SERVER['REQUEST_METHOD']);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        $personaController->showHome($params); 
        break;
    case 'nuevaPersona':
            $personaController->nuevaPersona();
        break;      
    case 'paginaPersonal':
        if ($params[1] == 'borrarTelefono'){
            $telefonoController->borrarTelefono( (int) $params[2]);
        }
        elseif($params[1] == 'formModTelefono'){
            if ($params[2] == 'modificarTelefono'){               
                    $telefonoController->modificarTelefono();}
            else{
                if(isset($params[2])){
                    $telefonoController->formModTelefono($params[2]);}
                else{$telefonoController->showHomeLocation();}
            }
        }
        else {
            if (isset($params[1])){
                $personaController->paginaPersonal( (int) $params[1]);}
            else{$personaController->showHomeLocation();}}
        break;
    case 'borrarPersona':
            if(isset($params[1])){
                $personaController->borrarPersona( (int) $params[1]);}
            else{$personaController->showHomeLocation();}
        break;
    case 'formModPersona':
        if($params[1] == 'modificarPersona'){
            $personaController->editarPersona();
        }else{
            if(isset($params[1])){
                $personaController->formModPersona($params[1]);}
            else{$personaController->showHomeLocation();}}
        break;
    case 'filtrarCiudad':
        if(isset($params[1])){$personaController->filtrarCiudad ($params[1]);}
        else{$personaController->filtrarCiudad ();}
        break;
    case 'agregar':
        $telefonoController->formsAgregar();
        break;
    case 'nuevoTelefono':
        $telefonoController->nuevoTelefono();
        break;
    case 'login':
        $userController->logeo();
        break;
    case 'registrar':
        $userController->registro();
        break;
    case 'logout':
        $userController->logout();
        break;
    case 'upgradeUser':
        $userController->superUser();
        break;
    case 'eliminarusuario':
        $userController->eliminarUsuario($params[1]);
        break;
}


?>