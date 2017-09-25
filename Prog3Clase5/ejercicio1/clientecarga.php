<?php
include_once "cliente.php";

$clientito = new Cliente($_GET['nombre'],$_GET['mail'],$_GET['clave'],$_GET['sexo']);

Cliente::Guardar($clientito);


?>