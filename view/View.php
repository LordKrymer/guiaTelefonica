<?php
    include_once "./libs/smarty-3.1.39/libs/Smarty.class.php";

    class View {
        private $smarty;
        function __construct()
        {
            $this->smarty = new Smarty();
        }
    }