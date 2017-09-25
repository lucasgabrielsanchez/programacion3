<?php
include_once "cliente.php";

$mail = $_POST['mail'];
$clave = $_POST['clave'];

$clientitos = Cliente::TraerListaClientes();

foreach ($clientitos as $cliente)
{
    if ($cliente->getMail() == $mail && $cliente->getClave() == $clave)
    {
        echo("Cliente Logueado");
    }
}

?>