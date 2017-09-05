<?php

class Vehiculo
{
    private $_patente;

    public function __construct($patente)
    {
        $this->_patente = $patente;
    }

    public function __toString()
    {
        return $this->_patente;
    }

}


?>