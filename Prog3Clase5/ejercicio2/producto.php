<?php
// posee 2 atributos privados, implementa la interfaz ivendible con el metodo precio + iva y tiene un metodo que se llama
//  "retornar array de productos" que retorna un array con 5 productos
class Producto implements Ivendible
{
    private $_nombre;
    private $_precio;

    public function __construct($nombre, $precio) 
    {
        $this->_nombre = $nombre;
        $this->_precio = $precio;
    }

    public static function retornarArrayDeProductos()
    {
        $productos[] = (new Producto("Fanta",200));
        $productos[] = (new Producto("Coca",300));
        $productos[] = (new Producto("Sprite",400));
        $productos[] = (new Producto("Manaos",500));
        $productos[] = (new Producto("Bichi",600));

        return $productos;
    }

    public function getNombre()
    {
        return $this->_nombre;
    }

    public function preciomasiva()
    {
        return $this->_precio *1.21;
    }
}

interface iVendible
{
    public function preciomasiva();
}
 ?>