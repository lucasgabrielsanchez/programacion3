<?php
include_once "persona.php";
include_once "empleado.php";

//no se puede por ser una clase abstracta.
//$personita = new Persona();

//echo "hello world".$personita->_nombre;

// $personita = new Persona("Sanchez",36901729,"Lucas",'M');


//mostrando los datos del objeto por el método __toString();
// echo $personita."<br>";

//mostrando datos con los métodos getters.
// echo $personita->getName()."<br>";
// echo $personita->getSurname()."<br>";
// echo $personita->getDni()."<br>";
// echo $personita->getSex()."<br>";

$empleadito = new Empleado("Sanchez",36901729,"Lucas",'M',105178,15.500);

//mostrando los datos del objeto por el método __toString();
echo $empleadito."<br>";

//invocando al método sobreescrito
echo $empleadito->Hablar("Español")."<br>";

//utilizando get que Empleado heredó de Persona
echo $empleadito->getName()."<br>";

//utilizando get propio de Empleado
echo $empleadito->getLegajo()."<br>";

?>