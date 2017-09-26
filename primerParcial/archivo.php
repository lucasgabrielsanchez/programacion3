<?php 
include_once "usuario.php";
include_once "comentarios.php";


class Archivo 
{
	public static function Subir()
	{

		$retorno["Exito"] = TRUE;
		
		/*pathinfo nos permite obtener información específica acerca de un path pasado como string
		el cual no necesariamente debe existir, solamente analiza el string y despues de la coma
		le pasamos lo que nos interesa obtener de dicho string, en este caso la extension*/
		$tipoArchivo = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);

		if ($_FILES["archivo"]["size"] > 5000000) 
		{
			$retorno["Exito"] = FALSE;
			$retorno["Mensaje"] = "El archivo es demasiado grande. Verifique!!";
			return $retorno;
		}

		$esImagen = getimagesize($_FILES["archivo"]["tmp_name"]);

		if($esImagen === FALSE) {//NO ES UNA IMAGEN
			$retorno["Exito"] = FALSE;
			$retorno["Mensaje"] = "S&oacute;lo son permitidas IMAGENES.";
			return $retorno;
		}
		else {// ES UNA IMAGEN

			//SOLO PERMITO CIERTAS EXTENSIONES
			if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif" && $tipoArchivo != "png") 
			{
				$retorno["Exito"] = FALSE;
				$retorno["Mensaje"] = "S&oacute;lo son permitidas imagenes con extensi&oacute;n JPG, JPEG, PNG o GIF.";
				return $retorno;
			}
		}

		//$archivoTmp = date("Ymd_His") . ".jpg";
		$archivo = $_POST["titulo"].".".$tipoArchivo;
		$destino = "imagenesDeComentario/" . $archivo;
		if (!move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino)) 
		{

			$retorno["Exito"] = FALSE;
			$retorno["Mensaje"] = "Ocurrio un error al subir el archivo. No pudo guardarse.";
			return $retorno;
		}
		else
		{
			$retorno["Mensaje"] = "Archivo subido exitosamente!!!"; 
			$retorno["PathTemporal"] = $destino;
			
			return $retorno;
		}
	}

	public static function Guardar($obj)
    {
        $resultado = FALSE;
        
        //ABRO EL ARCHIVO
        $ar = fopen("usuarios/usuarios.txt", "a");
        
        //ESCRIBO EN EL ARCHIVO
        $cant = fwrite($ar, $obj->toString()."\r\n");
        
        if($cant > 0)
        {
            $resultado = TRUE;			
        }
        //CIERRO EL ARCHIVO
        fclose($ar);
        
        return $resultado;
	}

	public static function Guardar2($obj1,$obj2,$obj3,$obj4)
    {
        $resultado = FALSE;
        
        //ABRO EL ARCHIVO
        $ar = fopen("comentarios/comentarios.txt", "a");
        
        //ESCRIBO EN EL ARCHIVO
        $cant = fwrite($ar, $obj1 . " - " . $obj2 . " - " . $obj3 . " - " . $obj4 . "\r\n");
        
        if($cant > 0)
        {
            $resultado = TRUE;			
        }
        //CIERRO EL ARCHIVO
        fclose($ar);
        
        return $resultado;
	}
	
	public static function TraerListaUsuarios()
	{
		
		$ListaDeUsuarios = array();
		//leo todos los productos del archivo
		$archivo=fopen("usuarios/usuarios.txt", "r");
		
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);

			/*fgets devuelve false si lee una línea vacía, cuándo puede suceder esto si existe
			la sentencia while(!feof($archivo)) mas arriba?, la realidad es que un renglon
			vacío cuenta como una línea en el archivo, por ende evaluar que fgets sea distinto
			de false es necesario ya que si lee una línea vacía devuelve false*/
			if ($archAux != false) 
			{
				$comentarios = explode(" - ", $archAux);
				
				$comentarios[0] = trim($comentarios[0]);
				$comentarios[1] = trim($comentarios[1]);
				$comentarios[2] = trim($comentarios[2]);
				$comentarios[3] = trim($comentarios[3]);
				$comentarios[4] = trim($comentarios[4]);

				if($comentarios[0] != "")
				{				
					$ListaDeUsuarios[] = (new Usuario($comentarios[0], $comentarios[1],$comentarios[2],$comentarios[3],$comentarios[4]));
				}
			} 
		}
			
		fclose($archivo);
		
		return $ListaDeUsuarios;
	}

	public static function TraerListaComentarios()
	{
		
		$ListaComentarios = array();
		//leo todos los productos del archivo
		$archivo=fopen("comentarios/comentarios.txt", "r");
		
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);

			/*fgets devuelve false si lee una línea vacía, cuándo puede suceder esto si existe
			la sentencia while(!feof($archivo)) mas arriba?, la realidad es que un renglon
			vacío cuenta como una línea en el archivo, por ende evaluar que fgets sea distinto
			de false es necesario ya que si lee una línea vacía devuelve false*/
			if ($archAux != false) 
			{
				$comentarios = explode(" - ", $archAux);
				
				$comentarios[0] = trim($comentarios[0]);
				$comentarios[1] = trim($comentarios[1]);
				$comentarios[2] = trim($comentarios[2]);
				$comentarios[3] = trim($comentarios[3]);

				if($comentarios[0] != "")
				{				
					$ListaComentarios[] = (new Comentario($comentarios[0], $comentarios[1],$comentarios[2],$comentarios[3]));
				}
			} 
		}
			
		fclose($archivo);
		
		return $ListaComentarios;
	}

	public static function SobreescribirArchivo($array)
	{
		unlink("usuarios/usuarios.txt");

		foreach ($array as $producto) 
		{
			self::Guardar($producto);
		}
	}

}

?>