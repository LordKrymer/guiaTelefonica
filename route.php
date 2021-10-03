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
        $Controller->nuevaPersona($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad']);
        break; 
   case 'formNuevaPersona': 
        $Controller->formNuevaPersona(); 
        break;      
    case 'paginaPersonal':
        if ($params[1] == 'borrarTelefono'){
            $Controller->borrarTelefono( (int) $params[2]);
        }
        elseif($params[1]== 'modificarTelefono'){
            $Controller->$modificarTelefono ;
        }
        else {
        $Controller->paginaPersonal( (int) $params[1]);}
        break;
    case 'borrarPersona':
        $Controller->borrarPersona( (int) $params[1]);
        break;
    case 'formModPersona':
        if($params[1] == 'modificarPersona'){
            $Controller->editarPersona($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad']);
        }else{
        $Controller->formModPersona($params[1]);}
        break;
    case 'filtrarCiudad':
        $Controller->filtrarCiudad ($_GET["ciudad"]);
        break; 
 /*   case 'createTask': 
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