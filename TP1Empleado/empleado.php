<?php

include_once "persona.php";

class Empleado extends Persona
{
    protected $_legajo;
    protected $_sueldo;

    public function __construct($nombre,$apellido,$dni,$sexo,$legajo,$sueldo)
    {
        //usando el constructor heredado del padre y agregándole funcionalidad al propio.
        parent::__construct($nombre,$apellido,$dni,$sexo);

        $this->_legajo = $legajo;
        $this->_sueldo = $sueldo;
    }

    //utilizando el __toString() del padre y agregándole datos propios.
    public function __toString()
    {
        return parent::__toString()."-".$this->_legajo."-".$this->_sueldo;
    }

    //sobreescribiendo método abstracto heredado
    public function Hablar($idioma)
    {
        return "El empleado habla ".$idioma;
    }

    //métodos individuales usados como getters.
    public function getLegajo()
    {
        return $this->_legajo;
    }
    public function getSueldo()
    {
        return $this->_sueldo;
    }
}


?>