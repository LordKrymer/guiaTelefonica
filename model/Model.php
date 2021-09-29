<?php

class model {
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=guiaTelefonica;charset=utf8', 'root', '');
    }
}