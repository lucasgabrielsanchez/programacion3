<?php

include_once "archivo.php";
include_once "cliente.php";
/*recibe nombre, mail, clave, y sexo de un cliente, busca por mail y si existen los datos, se guardan
los nuevos datos ingresados y la foto se guarda con el nuevo nombre ("no recibe foto"), si el mail
está en clientesactuales.txt, tomamos los datos y asignamos al mail, a la foto ya guardada se le 
cambia el nombre*/

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['nombre']) && isset($_POST['mail']) && isset($_POST['clave']) && isset($_POST['sexo']))
    {
        $arrayClientes = Archivo::TraerListaClientes();

        for ($i=0; $i < count($arrayClientes) ; $i++) 
        { 
            if($arrayClientes[$i]->getMail() == $_POST['mail'])
            {
                $pathViejo = $arrayClientes[$i]->getPathFoto();
                $pathNuevo = str_replace($arrayClientes[$i]->getNombre(),$_POST['nombre'],$pathViejo);

                $arrayClientes[$i]->setNombre($_POST['nombre']);
                $arrayClientes[$i]->setClave($_POST['clave']);
                $arrayClientes[$i]->setSexo($_POST['sexo']);
                $arrayClientes[$i]->setPathFoto($pathNuevo);

                rename($pathViejo,$pathNuevo);
            }
        }
        
        Archivo::SobreescribirArchivo($arrayClientes);
    }
}

?>