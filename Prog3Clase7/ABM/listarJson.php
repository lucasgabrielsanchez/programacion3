<?php
include_once ("clases/AccesoDatos.php");
include_once ("clases/cd.php");

$arraysDeCd =cd::TraerTodoLosCds();

$arraysDeCdJsonEncode = json_encode($arraysDeCd);

$arraysDeCdJsonDecode = json_decode($arraysDeCdJsonEncode);

$arrayDeCdNuevo = array();

print_r($arraysDeCdJsonDecode);
echo("<br><br>");

foreach ($arraysDeCdJsonDecode as $obj) 
{
    $objCd = new cd();

    $objCd->id = $obj->id;
    $objCd->titulo = $obj->titulo;
    $objCd->cantante = $obj->cantante;
    $objCd->año = $obj->año;

    array_push($arrayDeCdNuevo,$objCd);
}

print_r($arrayDeCdNuevo);

echo("<br><br>");

foreach ($arrayDeCdNuevo as $cd) 
{
    echo($cd->mostrarDatos()."<br>");
}
?>