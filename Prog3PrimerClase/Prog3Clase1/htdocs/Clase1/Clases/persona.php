<?php

    //Se llaman desde el index

    class Persona
    {
        $nombre;
        $apellido;
        $dni;

        public function __Construct($nombre, $apellido="", $dni=0)//simulando sobrecarga, para que $apellido y $dni sea opcional
                                                                //nombre es obligatorio
        {
            $this->nombre = $nombre;
        }

        //los métodos NO son caseSensitive a diferencia de las variables
        public static function saludarEstatico()
        {
            echo "Hola Estátco";
        }

        public function saludarInstancia()
        {
            echo "Hola Instancia";
        }
    }
    

?>