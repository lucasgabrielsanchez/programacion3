<?php
// recibe por get el nombre del producto y la cantidad, hace llamadas a metodos y retorna el precio total
//a pagar
include_once "producto.php";

$nombreProducto = $_GET['nombre'];
$cantidad = $_GET['cantidad'];

$productosTraidos = Producto::retornarArrayDeProductos();

$bandera = false;

foreach ($productosTraidos as $producto) 
{
    if ($producto->getNombre() == $nombreProducto)
    {
        $precioTotal = $cantidad * $producto->preciomasiva();

        echo('El precio total del producto "' . $nombreProducto . '" es de $' . $precioTotal);

        $bandera = true;

        break;
    }
}

if(!$bandera)
{
    echo("No disponemos del producto solicitado");
}

//$array = array();

// $producto = new Producto("Fanta",200);
// $producto1 = new Producto("Coca",300);
// $producto2 = new Producto("Sprite",400);
// $producto3 = new Producto("Manaos",500);
// $producto4 = new Producto("Bichi",600);

// array_push($array,$producto,$producto1,$producto2,$producto3,$producto4);

//var_dump($array);



?>