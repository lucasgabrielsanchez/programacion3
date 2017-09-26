<?php
include_once "usuario.php";
include_once "archivo.php";


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['mail']) && isset($_POST['titulo']) && isset($_POST['comentario']))
    {
        $mail = $_POST['mail'];
        $titulo = $_POST['titulo'];
        $comentario = $_POST['comentario'];

        $usuarios = Archivo::TraerListaUsuarios();
        
        foreach ($usuarios as $usuario)
        {
            if ($usuario->getMail() == $mail)
            {
                Archivo::Guardar2($mail, $titulo, $comentario);
                break;
            }
        }

    }
}

?>