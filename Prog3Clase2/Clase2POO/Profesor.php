<?php
include_once "Persona.php";

class Profesor extends Persona
{
    public function __construct($nombre, $apellido, $sexo)
    {
        parent::__construct($nombre, $apellido, $sexo);
    }

    public function mostrarDatos()
    {
        return parent::mostrarDatos();
    }

}