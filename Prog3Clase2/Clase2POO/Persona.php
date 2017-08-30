<?php

abstract class Persona
{
    public $nombre;
    public $apellido;
    public $sexo;

    public function __construct($nombre, $apellido, $sexo)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->sexo = $sexo;
    }

    protected function mostrarDatos()
    {
        return "Nombre: ".$this->nombre."<br>Apellido: ".$this->apellido."<br>Sexo: ".$this->sexo."<br>";
    }
}

?>