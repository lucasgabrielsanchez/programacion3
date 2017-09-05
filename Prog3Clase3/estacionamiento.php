<?php

class Estacionamiento
{
    public static function guardar($auto)
    {
        $ahora=date("Y/m/d H:i:s");
        echo "Estoy guardando ".$auto;
        $archivo = fopen("archivos/estacionados.txt","a");

        //guardando linea con salto
        fwrite($archivo,"$auto-$ahora\r\n");
        fclose($archivo);
    }

    public static function sacar($auto)
    {
        //echo "Estoy sacando ".$auto;
        $ruta = fopen("archivos/estacionados.txt", "r");
        //echo fread($ruta, filesize("archivos/estacionados.txt"))."\r\n";

        $ruta2 = fopen("archivos/facturados.txt", "a");
        //leyendo linea por linea
        while(!feof($ruta))
		{
            $autoleido = fgets($ruta);
            $archivoPartido = explode("-",$autoleido);

            //$auto devuelve su patente con toString()
            if($auto == $archivoPartido[0])
            {
                $ahora=date("Y/m/d H:i:s");
                fwrite($ruta2,"$autoleido-$ahora\r\n");
            }
            //var_dump($archivoPartido);
            break;
			//echo fgets($ruta)."<br>";
        }
        fclose($ruta);
        fclose($ruta2);
    }
}

?>