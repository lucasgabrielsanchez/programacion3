<?php
include_once ("clases/AccesoDatos.php");
include_once ("clases/cd.php");


if(isset($_POST['titulo']) && isset($_POST['cantante']) && isset($_POST['anio']))
{
    $unCd =new cd();
    $unCd->titulo= $_POST['titulo'];
    $unCd->año= $_POST['anio'];
    $unCd->cantante=$_POST['cantante'];
    $UltimoId=$unCd->InsertarElCd();
    print("Ultimo ID: $UltimoId <br> ");

    //inserta con binValue.
    // $unCd =new cd();
    // $unCd->titulo="nuevo Titulo";
    // $unCd->año=date("his");
    // $unCd->cantante="nuevo cantante";                                    
    // $UltimoId=$unCd->InsertarElCdParametros();
    // print("Ultimo ID: $UltimoId <br> ");

}

?>