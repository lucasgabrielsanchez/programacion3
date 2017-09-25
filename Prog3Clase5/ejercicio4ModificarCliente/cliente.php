<?php 

	class Cliente
	{
	// 	ClienteCarga.php
	// 1. Recibe por post los siguientes datos: Nombre, Mail, Clave, Sexo y foto
	// 2. Crea el objeto de tipo cliente
	// 3. Guarda en el archivo Clientes/ClientesActuales.txt en un renglon distinto

		private $_nombre;
		private $_mail;
		private $_clave;
		private $_sexo;
		private $_pathFoto;

		public function __construct($nombre, $mail, $clave, $sexo, $pathFoto)
		{
			$this->_nombre = $nombre;
			$this->_mail = $mail;
			$this->_clave = $clave;
			$this->_sexo = $sexo;
			$this->_pathFoto = $pathFoto;
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

		public function getPathFoto()
		{
			return $this->_pathFoto;
		}

		public function setNombre($nombre)
		{
			$this->_nombre = $nombre;
		}

		public function setMail($mail)
		{
			$this->_mail = $mail;
		}

		public function setClave($clave)
		{
			$this->_clave = $clave;
		}

		public function setSexo($sexo)
		{
			$this->_sexo = $sexo;
		}

		public function setPathFoto($pathFoto)
		{
			$this->_pathFoto = $pathFoto;
		}

		public function toString()
		{
			$string = $this->_nombre . " - " . $this->_mail . " - " . $this->_clave . " - " . $this->_sexo . " - " . $this->_pathFoto;
			return $string;
		}
	}


?>