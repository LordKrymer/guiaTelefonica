<?php
    require_once "./Model/telefonoModel.php";
    require_once "./Model/personaModel.php";
    require_once "./View/View.php";
    require_once "./Model/userModel.php";
    require_once "./helpers/helper.php";

    class PersonaController{
        private $personaModel;
        private $telefonoModel;
        private $view;
        private $userModel;
        private $helper;
        private $cantPaginas;
        private $presonasXpagina;
        private $maxSize;

        function __construct($personasPorPagina =9, $maxSize = 1000000)
        {
            $this->personaModel = new PersonaModel();
            $this->telefonoModel = new TelefonoModel();
            $this->view = new View();
            $this->userModel = new userModel();
            $this->helper = new Helper();
            $this->presonasXpagina = $personasPorPagina;
            $this->cantPaginas = $this->calcularCantPaginas($personasPorPagina);
            $this->maxSize = $maxSize;
        }
// Funciones Generales
        function calcularCantPaginas($personasPorPagina){
            $cantPersonas = $this->personaModel->getCantPersonas();
            return ceil($cantPersonas/$personasPorPagina);
        }

        function showHomeLocation(){
            $this->view->showHomeLocation();
        }


        function borrarImagen($id){
            if ($this->helper->checkAdmin()) {
                $persona = $this->personaModel->traerPersona($id);
                $foto = $persona->ruta_imagen;
                unlink($foto);
                $this->personaModel->borrarImagen($id);
                $this->view->showHomeLocation();
            }
        }

        


        function uploadFile($DNI){
            if ($this->helper->checkAdmin() && $this->valid_file()){
                $filePath = "imagenesSubidas/" . uniqid("", false) . "."
                                       . strtolower(pathinfo($_FILES['uploadedFile']['name'], PATHINFO_EXTENSION));
                move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $filePath);
                $this->personaModel->uploadFile($DNI, $filePath);
                $this->goBack();
            }
        }

        function valid_file(){
            $file = $_FILES['uploadedFile'];
            $file_name = $file['name'];
            $file_size = $file['size'];
            $file_error = $file['error'];
            $file_parts = explode('.', $file_name);
            $file_ext = strtolower(end($file_parts));
            $allowed = array('jpg', 'jpeg', 'png');
            if (in_array($file_ext, $allowed))
                if ($file_error === 0)
                    if ($file_size <= $this->maxSize)
                       { echo true;
                        return true;}
                    else
                        echo "El archivo es demasiado grande";
    
                else
                    echo "Error al subir el archivo";
                
            else
                echo "Extension invalida";
            
            return false;
        }

        function goBack(){
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }


        function showHome($params = null)
        {
            $ciudades = $this->personaModel->traerCiudades();
            $props = $this->helper->getProps();
            $props['cantPaginas']=$this->cantPaginas;
            if (isset($params[1])){
                if($params[1] > $this->cantPaginas){$this->showHome(["home",$this->cantPaginas]);}
                if($params[1] < 1){$this->showHome(["home",1]);}

                $props['paginaActual'] = $params[1];
                $personas = $this->personaModel->personasPorPagina($params[1], $this->presonasXpagina);
                $this->view->showHome($personas, $ciudades, $props);
            }
            else{
                $this->showHome(["home",1]);
            }
        }
        //Funciones Personas
        function nuevaPersona ($params = null){
            $props = $this->helper->getProps();
            if (isset($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad'])){
                if (! $this->personaModel->traerPersona($_POST['DNI'])){
                $this->personaModel->nuevaPersona($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad']);
                }
                $this->view->showHomeLocation();}
            else {$this->view->showHomeLocation();}
        }
        function formNuevaPersona(){
            $props = $this->helper->getProps();
            if ($this->helper->checkAdmin()){
                $ciudades = $this->personaModel->traerCiudades();
                $this->view->formNuevaPersona($ciudades,$props);}
            else {$this->view->showHomeLocation();}
        }

        function paginaPersonal($DNI){
            $props = $this->helper->getProps();
            $persona = $this->personaModel->traerPersona($DNI);
            $telefonos = $this->telefonoModel->traerTelefonos($DNI);
            $this->view->mostrarPaginaPersonal($persona,$telefonos,$props);
        }
        
        function borrarPersona($DNI){
            $props = $this->helper->getProps();
            if ($this->helper->checkAdmin()){
                if ($this->personaModel->traerPersona($DNI))/* ENTONCES */ $this->model->borrarPersona($DNI);
                $this->view->showHomeLocation();}
            else {$this->view->showHomeLocation();}
        }
        function formModPersona($DNI){
            $props = $this->helper->getProps();
            if ($this->helper->checkAdmin()){
                $ciudades = $this->personaModel->traerCiudades();
                $persona = $this->personaModel->traerPersona($DNI);
                $this->view->formModPersona($persona, $ciudades,$props);}
            else {$this->view->showHomeLocation();}
            
        }
        function editarPersona(){
            $props = $this->helper->getProps();
            if (isset($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad'])){
                $this->personaModel->editarPersona($_POST['DNI'] , $_POST['nombre'] , $_POST['apellido'], $_POST['ciudad']);
                if (isset($_FILES['uploadedFile'])){$this->uploadFile($_POST['DNI']);}
                $this->view->showHomeLocation();}
            else{$this->view->showHomeLocation();}
        }
        
        function filtrarCiudad ($pagina = 1){
            $props = $this->helper->getProps();
            if (isset($_GET["ciudad"])){
                $props['paginaActual'] = $pagina;
                $personas = $this->personaModel->personasPorCiudad($_GET["ciudad"],$pagina,$this->presonasXpagina);
                $this->cantPaginas = ceil(count($personas)/$this->presonasXpagina);
                $props['cantPaginas']=$this->cantPaginas;
                $ciudades = $this->personaModel->traerCiudades();
                $this->view->showHome($personas,$ciudades,$props);}
            else {$this->view->showHomeLocation();}
        }
    }