<?php
include_once ("clases/AccesoDatos.php");
include_once ("clases/cd.php");

if(isset($_POST['id']))
{
    $unCd =cd::TraerUnCd($_POST['id']);

    if (isset($_POST['titulo']))
    {
        $unCd->titulo=$_POST['titulo'];
    }
    
    if (isset($_POST['anio']))
    {
        $unCd->año=$_POST['anio'];
    }

    if (isset($_POST['cantante']))
    {
        $unCd->cantante=$_POST['cantante'];
    }

    $cantidadDeAfectadas=$unCd->ModificarCd();

    print("filas afectadas :$cantidadDeAfectadas<br>");
}
else
{
    print("El id no fué seteado");
}
?>