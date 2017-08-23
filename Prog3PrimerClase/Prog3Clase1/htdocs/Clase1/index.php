<?php

//incluyo la clase persona

include "./Clases/persona.php";
include "./Clases/policia.php"; 
//include "./Clases/persona1.php"; //tira un warning si esta mal o no existe pero sigue funcionando el programa

//require //tira un error fatal si está mal y el programa no sigue funcionando

//asi llamo a un metodo estático de una clase;
Persona::saludarEstatico();
echo"<br>";
//asi instancio una persona e invoco su metodo de instancia
$personita = new Persona();

$personita->saludarInstancia();
echo"<br>";
Persona::SaludarInstancia(); //notese que llamo a un metodo de instancia como si fuese a un estático y funciona y el metodo no tiene
                             //sensibilidad (caseSensitive) de mayusculas y minusculas



// echo "Hola mundo";

// $vec = array(1,2,3,5);

// var_dump($vec);

// echo $vec; //no puedo imprimir un vector/array asi directamente, se puede con var_dump

// echo "<br>";
// echo "aplicacion 1<br>";

// $acum = 0;
// $acum2 = 0;

// for($i=1; $i<=1000; $i++)
// {
//     if ($acum>999)
//      {
//         echo "se sumaron ".$i." numeros<br>";
//         $acum -= $i;
//         echo "la suma dio ".$acum;
//         break;
//      }

//      echo "numero a sumar: ".$i."<br>";//con . concateno

//      $acum += $i; 
     
// }

// echo "<br><br>";
// echo "aplicacion 2<br>";

// echo date("d/m/y"); //muestro la fecha con un formato especificado

// $mes = date("m");
// $dia = date("d");

// //if(($mes == 3 && $dia >=20) || $mes >3 && $mes < )


?>

<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <h1>Titulo</h1>
</head>
<body>
    
</body>
</html>-->

