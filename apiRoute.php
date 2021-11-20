<?php

include_once "libs/Router.php";
include_once "./controller/apiPersonasController.php";
include_once "./controller/apiTelefonosController.php";
include_once "./controller/apiComentariosController.php";

$router = new Router();


// Manejo de personas
$router->addRoute('personas','GET','apiPersonasController','traerPersonas');
$router->addRoute('personas/:ID','GET' , 'apiPersonasController' , 'traerPersona');
$router->addRoute('personas','POST' , 'apiPersonasController' , 'crearPersona');
$router->addRoute('personas/:ID','DELETE' , 'apiPersonasController' , 'borrarPersona');

// Manejo de Telefonos
$router->addRoute('telefonos','GET','apiTelefonosController','traerTelefonos');
$router->addRoute('telefonos/:DNI','GET','apiTelefonosController','traerTelefonos');
$router->addRoute('telefonos/:DNI/:ID','GET','apiTelefonosController','traerTelefono');
$router->addRoute('telefonos/:DNI','POST','apiTelefonosController','crearTelefono');
$router->addRoute('telefonos/:DNI/:ID','DELETE','apiTelefonosController','borrarTelefono');

// Manejo de Comentarios
$router->addRoute('comentarios','GET','apiComentariosController','traerComentarios');
$router->addRoute('comentarios/:DNI','GET','apiComentariosController','comentariosXPersona');
$router->addRoute('comentarios/:DNI/:orden','GET','apiComentariosController','ComentariosOrdenados');
$router->addRoute('comentarios','POST','apiComentariosController','crearComentario');
$router->addRoute('comentarios/:ID','DELETE','apiComentariosController','eliminarComentario');


//Rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);