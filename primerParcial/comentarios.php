<?php

Class Comentario
{
    private $_mail;
    private $_titulo;
    private $_comentario;
    private $_path;

    public function __construct($mail, $titulo, $comentario, $path)
    {
        $this->_mail = $mail;
        $this->_titulo = $titulo;
        $this->_comentario = $comentario;
        $this->_path = $path;
    }

    public function getMail()
    {
        return $this->_mail;
    }

    public function getTitulo()
    {
        return $this->_titulo;
    }

    public function getPath()
    {
        return $this->_path;
    }

    
}


?>