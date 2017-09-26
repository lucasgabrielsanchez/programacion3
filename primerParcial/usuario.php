<?php
class Usuario
{
    private $_nombre;
    private $_mail;
    private $_perfil;
    private $_edad;
    private $_clave;

    public function __construct($nombre, $mail, $perfil, $edad, $clave)
    {
        $this->_nombre = $nombre;
        $this->_mail = $mail;
        $this->_perfil = $perfil;
        $this->_edad = $edad;
        $this->_clave = $clave;
    }

    public function toString()
    {
        $string = $this->_nombre . " - " . $this->_mail . " - " . $this->_perfil . " - " . $this->_edad . " - " . $this->_clave;
        return $string;
    }
    
    public function getMail()
    {
        return $this->_mail;
    }

    public function getClave()
    {
        return $this->_clave;
    }

    public function getNombre()
    {
        return $this->_nombre;
    }

    public function getEdad()
    {
        return $this->_edad;
    }
}

?>