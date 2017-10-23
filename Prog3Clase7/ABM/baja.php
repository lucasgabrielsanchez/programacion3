<?php
    include_once ("clases/AccesoDatos.php");
    include_once ("clases/cd.php");

    if(isset($_POST['id']))
    {

        $unCd =cd::TraerUnCd($_POST['id']);
        
        //verifico si existe
        if(isset($unCd->cantante))
        {
            $cantidadDeAfectadas=$unCd->BorrarCd();
            print("filas afectadas :$cantidadDeAfectadas<br>");
        }
        else
        {
            print("no existe la instancia<br>");
        }
    }

    if(isset($_POST['anio']))
    {
        $cantidadDeAfectadas =cd::BorrarCdPorAnio($_POST['anio']);
        print("filas afectadas :$cantidadDeAfectadas<br>");
    }
?>