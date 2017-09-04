<?php

abstract class Persona
{
    private $_nombre;
    private $_apellido;
    private $_dni;
    private $_sexo;


    // public function __construct()
    // {
    //     $this->_nombre = "Juancho";
    // }

    public function __construct($apellido, $dni, $nombre, $sexo)
    {
        $this->_apellido = $apellido;
        $this->_dni = $dni;
        $this->_nombre = $nombre;
        $this->_sexo = $sexo;
    }

    //__toString() conocido como "método mágico", el cual permitirá por ejemplo que al hacer un echo directamente
    //de un objeto de esta clase, se imprima por pantalla lo que esté dentro de este método, sin necesidad
    //de invocar el método, queda claro?.
    public function __toString()
    {
        return $this->_nombre."-".$this->_apellido."-".$this->_dni."-".$this->_sexo;
    }


    //funcion mágica o "propiedad" que retorna algo que le pedimos de la clase, solo se puede declarar una vez
    //y el parámetro pasado solo es simbólico, al invocar este get simplemente traerá lo que dice en
    //su cuerpo, no es útil es mejor usar métodos getters y setters.
    // public function __get($name)
    // {
    //     return $this->_nombre;
    // }
    

    //métodos individuales usados como getters.
    public function getName()
    {
        return $this->_nombre;
    }
    public function getSurname()
    {
        return $this->_apellido;
    }
    public function getDni()
    {
        return $this->_dni;
    }
    public function getSex()
    {
        return $this->_sexo;
    }

    public abstract function Hablar($idioma);
}

?>