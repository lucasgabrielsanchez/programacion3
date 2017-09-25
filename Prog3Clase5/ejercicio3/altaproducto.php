<?php

//recibe por post el nombre, el precio y tambien una foto del producto, guardar la foto con el nombre y el producto
include_once "producto.php";
include_once "archivo.php";

//$productito = new Producto($_POST['nombre'],$_POST['precio']);
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];

$retornoSubir = Archivo::Subir();

if($retornoSubir["Exito"])
{
    $productito = new Producto($nombre,$precio,$retornoSubir["PathTemporal"]);

    Archivo::Guardar($productito);
}


//$probando = pathinfo("hola.jpg", PATHINFO_EXTENSION)

//echo ("asd");




?>