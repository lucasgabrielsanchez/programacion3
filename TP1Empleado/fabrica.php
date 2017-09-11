<?php

include_once "empleado.php";

class Fabrica
{
    private $_empleados;
    private $_razonSocial = "";

    public function __construct($razonSocial)
    {
        $this->_empleados = array();
        $this->_razonSocial = $razonSocial;
    }

    public function AgregarEmpleado($empleado)
    {
        array_push($this->_empleados,$empleado);
    }

    public function CalcularSueldos()
    {
        $sueldoTotal = 0;

        foreach ($this->_empleados as $empleado) 
        {
            $sueldoTotal += $empleado->getSueldo();
        }

        return $sueldoTotal;
    }

    public function EliminarEmpleado($empleadoAEliminar)
    {
        // $empleadoEncontrado = false;

        // foreach ($this->_empleados as $empleado) 
        // {
        //     if($empleado == $empleadoAEliminar)
        //     {
        //         $empleadoEncontrado = true;
        //     }
        // }

        // if($empleadoEncontrado)
        // {
        //     unset($this->_empleados[$empleadoAEliminar]);
        // }
        
        
        
        for ($i=0; $i < count($this->_empleados); $i++)
        { 
            if($this->_empleados[$i] == $empleadoAEliminar)
            {
                unset($this->_empleados[$i]);
            }
        }
    }

    public function EliminarEmpleadosRepetidos()
    //el método array_unique crea una copia del array pasado por parámetro y retorna dicha copia con los 
    //elementos duplicados eliminados, solo queda uno de cada uno.
    {
        $this->_empleados = array_unique($this->_empleados);
    }

    public function __toString()
    {
        $stringFabrica = $this->_razonSocial."<br>";

        foreach ($this->_empleados as $empleado) 
        {
            $stringFabrica .= $empleado . "<br>";
            
        }

        return $stringFabrica;
    }
}



?>