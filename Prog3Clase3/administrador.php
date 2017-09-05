<?php
include_once "vehiculo.php";
include_once "estacionamiento.php";


$auto = new Vehiculo("abc123");
$accion = "guardar";

if($accion=="guard")
{
    Estacionamiento::guardar($auto);
}
else
{
    Estacionamiento::sacar($auto);
}

?>