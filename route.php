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
        $Controller->showHome(); 
        break;
    case 'nuevaPersona':
        if (isset($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad'])){
            $Controller->nuevaPersona($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad']);}
        else {$Controller->showHomeLocation();}
        break;      
    case 'paginaPersonal':
        if ($params[1] == 'borrarTelefono'){
            $Controller->borrarTelefono( (int) $params[2]);
        }
        elseif($params[1] == 'formModTelefono'){
            if ($params[2] == 'modificarTelefono'){
                if(isset($_POST['id'],$_POST['caracteristica'],$_POST['telefono'],$_POST['compania'], $_POST['propietario'])){
                    $Controller->modificarTelefono($_POST['id'],$_POST['caracteristica'],$_POST['telefono'],$_POST['compania'], $_POST['propietario']);            }
                else {$Controller->showHomeLocation();}}
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
            if (isset($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad'])){
            $Controller->editarPersona($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad']);
            }
            else{$Controller->showHomeLocation();}
        }else{
            if(isset($params[1])){
                $Controller->formModPersona($params[1]);}
            else{$Controller->showHomeLocation();}}
        break;
    case 'filtrarCiudad':
        $Controller->filtrarCiudad ($_GET["ciudad"]);
        break;
    case 'agregar':
        $Controller->formsAgregar();
        break;
    case 'nuevoTelefono':
        if (isset($_POST['propietario'],$_POST['caracteristica'],$_POST['telefono'],$_POST['compania'])) {
            $Controller->nuevoTelefono($_POST['propietario'],$_POST['caracteristica'],$_POST['telefono'],$_POST['compania']);
        }
        else {$Controller->showHomeLocation();}
        break;
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (isset($_POST['nombre'],$_POST['password'])){
                $Controller->login($_POST['nombre'],$_POST['password']);}
            else{$Controller->showHomeLocation();}
        }
        elseif($_SERVER['REQUEST_METHOD'] === 'GET'){
            $Controller->ShowLoginForm();
        }
        break;
    case 'registrar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (isset($_POST['nombre'],$_POST['password'])){
                $Controller->registrar($_POST['nombre'],$_POST['password']);}
            else{$Controller->showHomeLocation();}
        }
        elseif($_SERVER['REQUEST_METHOD'] === 'GET'){
            $Controller->ShowRegisterForm();
        }
        break;
    case 'logout':
        $Controller->logout();
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