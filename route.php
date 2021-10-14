<?php
require_once "controller/Controller.php";


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);

$Controller = new Controller();


// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        $Controller->showHome($params); 
        break;
    case 'nuevaPersona':
            $Controller->nuevaPersona();
        break;      
    case 'paginaPersonal':
        if ($params[1] == 'borrarTelefono'){
            $Controller->borrarTelefono( (int) $params[2]);
        }
        elseif($params[1] == 'formModTelefono'){
            if ($params[2] == 'modificarTelefono'){               
                    $Controller->modificarTelefono();}
            else{
                if(isset($params[2])){
                    $Controller->formModTelefono($params[2]);}
                else{$Controller->showHomeLocation();}
            }
        }
        else {
            if (isset($params[1])){
                $Controller->paginaPersonal( (int) $params[1]);}
            else{$Controller->showHomeLocation();}}
        break;
    case 'borrarPersona':
            if(isset($params[1])){
                $Controller->borrarPersona( (int) $params[1]);}
            else{$Controller->showHomeLocation();}
        break;
    case 'formModPersona':
        if($params[1] == 'modificarPersona'){
            $Controller->editarPersona();
        }else{
            if(isset($params[1])){
                $Controller->formModPersona($params[1]);}
            else{$Controller->showHomeLocation();}}
        break;
    case 'filtrarCiudad':
        $Controller->filtrarCiudad ();
        break;
    case 'agregar':
        $Controller->formsAgregar();
        break;
    case 'nuevoTelefono':
        $Controller->nuevoTelefono();
        break;
    case 'login':
        $Controller->logeo();
        break;
    case 'registrar':
        $Controller->registro();
        break;
    case 'logout':
        $Controller->logout();
        break;
    case 'upgradeUser':
        $Controller->superUser();
        break;
    
        /*   case 'createTask':  //
        $Controller->createTask(); 
        break;
    case 'deleteTask': 
        $taskController->deleteTask($params[1]); 
        break;
    case 'updateTask': 
        $taskController->updateTask($params[1]); 
        break;
    case 'viewTask': 
        $taskController->viewTask($params[1]); 
        break;
    default: 
        echo('404 Page not found'); 
        break;
*/
}


?>