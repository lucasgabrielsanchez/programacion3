<?php
include_once "cliente.php";
include_once "archivo.php";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['nombre']) && isset($_POST['mail']) && isset($_POST['clave']) && isset($_POST['sexo']) && isset($_FILES['archivo']))
    {

        $retornoSubir = Archivo::Subir();

        if($retornoSubir["Exito"] == true)
        {
            $clientito = new Cliente($_POST['nombre'],$_POST['mail'],$_POST['clave'],$_POST['sexo'],$retornoSubir['PathTemporal']);
            
            Archivo::Guardar($clientito);
        }
        else
        {
            echo($retornoSubir["Mensaje"]);
        }

        
    }
}


?>