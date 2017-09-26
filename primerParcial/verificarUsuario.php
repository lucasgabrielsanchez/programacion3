<?php
include_once "usuario.php";
include_once "archivo.php";


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['mail']) && isset($_POST['clave']))
    {

        $mail = $_POST['mail'];
        $clave = $_POST['clave'];

        $resultado = 0;

        $usuarios = Archivo::TraerListaUsuarios();

        foreach ($usuarios as $usuario)
        {
            if ($usuario->getMail() == $mail)
            {
                if($usuario->getClave() == $clave)
                {
                    $resultado = 1;
                    break;
                }
                else
                {
                    $resultado = 2;
                }
            }
            else
            {
                $resultado = 3;
            }
        }

        if($resultado == 1)
        {
            echo("Bienvenido");
        }
        else if($resultado == 2)
        {
            echo("La clave es incorrecta");
        }
        else if($resultado == 3)
        {
            echo("Usuario inexistente");
        }
    }
}

?>