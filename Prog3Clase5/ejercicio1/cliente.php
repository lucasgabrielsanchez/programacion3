<?php 

	class Cliente
	{
	// 	ClienteCarga.php
	// 1. Recibe por get los siguientes datos: Nombre, Mail, Clave y Sexo
	// 2. Crea el objeto de tipo cliente
	// 3. Guarda en el archivo Clientes/ClientesActuales.txt en un renglon distinto

		private $_nombre;
		private $_mail;
		private $_clave;
		private $_sexo;

		public function __construct($nombre, $mail, $clave, $sexo)
		{
			$this->_nombre = $nombre;
			$this->_mail = $mail;
			$this->_clave = $clave;
			$this->_sexo = $sexo;
		}


		public function getNombre()
		{
			return $this->_nombre;
		}

		public function getMail()
		{
			return $this->_mail;
		}

		public function getClave()
		{
			return $this->_clave;
		}

		public function getSexo()
		{
			return $this->_sexo;
		}

		public function __toString()
		{
			$string = $this->_nombre . " - " . $this->_mail . " - " . $this->_clave . " - " . $this->_sexo;
			return $string;
		}

		public static function Guardar($obj)
		{
			$resultado = FALSE;
			
			//ABRO EL ARCHIVO
			$ar = fopen("clientes/ClientesActuales.txt", "a");
			
			//ESCRIBO EN EL ARCHIVO
			$cant = fwrite($ar, $obj->__toString()."\r\n");
			
			if($cant > 0)
			{
				$resultado = TRUE;			
			}
			//CIERRO EL ARCHIVO
			fclose($ar);
			
			return $resultado;
		}

		public static function TraerListaClientes()
		{
			
			$ListaDeClientes = array();
			//leo todos los productos del archivo
			$archivo=fopen("Clientes/ClientesActuales.txt", "r");
			
			while(!feof($archivo))
			{
				$archAux = fgets($archivo);

				/*fgets devuelve false si lee una línea vacía, cuándo puede suceder esto si existe
				la sentencia while(!feof($archivo)) mas arriba?, la realidad es que un renglon
				vacío cuenta como una línea en el archivo, por ende evaluar que fgets sea distinto
				de false es necesario ya que si lee una línea vacía devuelve false*/
				if ($archAux != false) 
				{
					$clientes = explode(" - ", $archAux);
					
					$clientes[0] = trim($clientes[0]);
					$clientes[1] = trim($clientes[1]);
					$clientes[2] = trim($clientes[2]);
					$clientes[3] = trim($clientes[3]);
	
					if($clientes[0] != "")
					{				
						$ListaDeClientes[] = (new Cliente($clientes[0], $clientes[1],$clientes[2],$clientes[3]));
					}
				} 
			}
				
			fclose($archivo);
			
			return $ListaDeClientes;
		}

		


	}


?>