<?php
//si recibe un nombre por get, retorna si el producto está en la lista, si lo recibe por post, con el parámetro "quedebohacer" = borrar
//se debe borrar al producto y mover la foto al subdirectorio /productosBorrados con el nombre formado por el producto y la fecha de
//borrado

include_once "archivo.php";
include_once "producto.php";

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if(isset($_GET['nombre']))
    {
        $nombre = $_GET['nombre'];
        $listaProductos = Archivo::TraerListaProductos();

        foreach ($listaProductos as $producto) 
        {
            if($producto->getNombre() == $nombre)
            {
                echo "El producto existe";
                break;
            }
        }


    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['queDeboHacer']) && isset($_POST['nombre']))
    {
        $queDeboHacer = $_POST['queDeboHacer'];
        $nombre = $_POST['nombre'];

        $listaProductos = Archivo::TraerListaProductos();
        
        for ($i=0; $i < count($listaProductos); $i++) 
        { 
            if($listaProductos[$i]->getNombre() == $nombre)
            {
                if($queDeboHacer == "Borrar")
                {
                    mkdir("productosBorrados/");
                    $pathViejo = $listaProductos[$i]->getPath();

                    $extension = pathinfo($pathViejo,PATHINFO_EXTENSION);                    

                    rename($pathViejo, "productosBorrados/".$nombre.date("Ymd_His").".".$extension);

                    unset($listaProductos[$i]);

                    Archivo::SobreescribirArchivo($listaProductos);

                    break;
                }                
            }
            else
            {
                echo ("El producto a borrar no existe");
            }
        }
    }
}

// if(isset($_GET['nombre']))
// {
//     echo "entré al get";
// }

// if(isset($_POST['queDeboHacer']))
// {
//     echo "entré al post";
// }

?>