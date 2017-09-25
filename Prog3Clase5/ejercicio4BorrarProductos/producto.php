<?php
    // posee 2 atributos privados, implementa la interfaz ivendible con el metodo precio + iva y tiene un metodo que se llama
    //"retornar array de productos" que retorna un array con 5 productos
class Producto
{
    private $_nombre;
    private $_precio;
    private $_path;

    public function __construct($nombre, $precio, $path) 
    {
        $this->_nombre = $nombre;
        $this->_precio = $precio;
        $this->_path = $path;
    }

    public function getNombre()
    {
        return $this->_nombre;
    }

    public function getPrecio()
    {
        return $this->_precio;
    }

    public function getPath()
    {
        return $this->_path;
    }

    public function toString()
    {
        $string = $this->_nombre . " - " . $this->_precio. " - " . $this->_path;
        return $string;
    }
}


 ?>