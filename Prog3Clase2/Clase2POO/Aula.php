<?php
include_once "Persona.php";
include_once "Alumno.php";
include_once "Profesor.php";

class Aula
{
    public $alumnos = array();
    public $profesor;

    public function __construct($profesor)
    {
        $this->profesor = $profesor;
    }

    public function agregarAlumno($alumno)
    {
        array_push($this->alumnos, $alumno);
    }

    // public function agregarProfesor($profesor)
    // {
    //     $this->profesor = $profesor;
    // }

    public function mostrarAula()
    {
        //echo "Profesor".$this->profesor."<br>";
        echo "Profesor: <br>".$this->profesor->mostrarDatos();
        echo "<br> Alumnos:<br>";

        foreach($this->alumnos as $alumno)
        {
            echo $alumno->mostrarDatos();
        }
        echo "<br><br>";
    }

    public function buscarAlumno($nombreAl, $apellidoAl="", $sexoAl="")
    {
        $retorno = false;

        if ($apellidoAl != "")
        {
            if($sexoAl != "")
            {
                foreach($this->alumnos as $alumno)
                {
                    
                }
            }
            else
            {
                foreach($this->alumnos as $alumno)
                {

                }
            }
        }
        else
        {
            foreach($this->alumnos as $alumno)
            {

            }
        }
    }

}

?>