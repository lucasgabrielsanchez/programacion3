<?php
include_once "vehiculo.php";
include_once "estacionamiento.php";

//variales superglobales: $_GET[] la vamos a usar para pedir: listados o lo que sea, los datos no viajan encriptados;
//                         $_POST la vamos a usar para setear, modificar datos.
//testear con var_dump y die
//recomendable leer un archivo y guardarlo en un array y con ese array hacer la lógica.

//var_dump($_GET);
//$patente = $_GET[´patente´];
//var_dump($_POST);
//echo "Hola HTTP";

// $auto = $_POST['patente'];
// $auto = $_POST['nombre'];
var_dump($_POST);


?>