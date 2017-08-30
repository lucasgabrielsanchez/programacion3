<?php
include_once "Alumno.php";
include_once "Profesor.php";
include_once "Aula.php";
include_once "Facultad.php";

//Tp Alumno Aula Profesor
// Se necesita tener el listado diez aulas, con los alumnos y el profesor a cargo,
// Para buscar por nombre y/o apellido y/o sexo  :
// Un alumno en todas las aulas.
// Un alumno en un aula.
// Un profesor en las aulas.
// Cantidad de veces que aparece un alumno en las aulas.   
// Una persona en las alulas.
// Cantidad y listado de personas con el mismo apellido y/o nombre y/o sexo.

// Se debe crear la jerarquía de clases, sabiendo que una de las clases es abstracta. 

$alumnito = new Alumno("Juan","Perez",'M');
$alumnito5 = new Alumno("Juan","Perez",'M');
$alumnito1 = new Alumno("Malena","Dias",'F');
$alumnito2 = new Alumno("Ronaldo","Sanchez",'M');
$alumnito3 = new Alumno("Laura","Milan",'F');
$profesor = new Profesor("Jorge","Dias",'M');

//echo $alumnito->nombre.$alumnito->apellido;
//echo $profesor->nombre.$profesor->apellido;
//echo $alumnito->mostrarDatos();
//echo $profesor->mostrarDatos();

$aula = new Aula($profesor);
$aula2 = new Aula($profesor);

$aula->agregarAlumno($alumnito);
$aula->agregarAlumno($alumnito1);
$aula->agregarAlumno($alumnito2);

$aula2->agregarAlumno($alumnito3);

//$aula->agregarProfesor($profesor);

$aula->mostrarAula();
$aula2->mostrarAula();

$facultad = new Facultad();

$facultad->agregarAula($aula);
$facultad->agregarAula($aula2);

$hola = "hola";
$hola2 = "hola";

if($alumnito == $alumnito2)
echo "xD";

?>