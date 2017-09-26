<?php

include_once "usuario.php";
include_once "archivo.php";

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if(isset($_GET['nombre']) && isset($_GET['mail']) && isset($_GET['perfil']) && isset($_GET['edad']) && isset($_GET['clave']))
    {
       
        $usuario = new Usuario($_GET['nombre'],$_GET['mail'],$_GET['perfil'],$_GET['edad'],$_GET['clave']);
            
        Archivo::Guardar($usuario);
    }
}
?>