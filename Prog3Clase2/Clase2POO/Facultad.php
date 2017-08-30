<?php

include_once "Aula.php";

    class Facultad
    {
        public $aulas = array("");

        public function __construct()
        {

        }

        public function agregarAula($aula)
        {
            array_push($this->aulas, $aula);
        }

    }

?>