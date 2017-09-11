<?php
include_once "persona.php";
include_once "empleado.php";
include_once "fabrica.php";

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
$empleadito2 = new Empleado("Sanchez2",36901729,"Lucas",'M',105178,15.500);
$empleadito3 = new Empleado("Sanchez3",36901729,"Lucas",'M',105178,15.500);

//mostrando los datos del objeto por el método __toString();
echo $empleadito."<br>";

//invocando al método sobreescrito
//echo $empleadito->Hablar("Español")."<br>";

//utilizando get que Empleado heredó de Persona
//echo $empleadito->getName()."<br>";

//utilizando get propio de Empleado
//echo $empleadito->getLegajo()."<br>";

$fabriquita = new Fabrica("Ahrre");

$fabriquita->AgregarEmpleado($empleadito);
$fabriquita->AgregarEmpleado($empleadito2);
$fabriquita->AgregarEmpleado($empleadito2);
$fabriquita->AgregarEmpleado($empleadito2);
$fabriquita->AgregarEmpleado($empleadito3);

//mostrando el sueldo total contenido de los empleados de la fabrica.
echo $fabriquita->CalcularSueldos()."<br>";

//mostrando el __toString() de Fabrica
echo $fabriquita;

//eliminando un empleado
//$fabriquita->EliminarEmpleado($empleadito3);

//eliminando objetos repetidos de un arrray
$fabriquita->EliminarEmpleadosRepetidos();

//volviendo a mostrar fabrica con el empleado eliminado
echo $fabriquita;


?>