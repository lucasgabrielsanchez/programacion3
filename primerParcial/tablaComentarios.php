<?php
// retorna una tabla de productos con la imagen correspondiente de cada producto, recomendacion:guardar fotos png o jpg
// guardar foto con el nombre del producto;

 include_once "comentarios.php";
 include_once "usuario.php";
 include_once "archivo.php";

    $grilla = '<table class="table">
    <thead style="background:rgb(14, 26, 112);color:#fff;">
        <tr>
            <th>  NOMBRE </th>
            <th>  EDAD     </th>
            <th>  TITULO      </th>
            <th>  FOTO      </th>
        </tr>  
    </thead>';   	

    $ArrayDeUsuarios = Archivo::TraerListaUsuarios();
    $ArrayDeComentarios = Archivo::TraerListaComentarios();

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['usuario']))
        {
            $bandera = false;

            $usuarioPost = $_POST['usuario'];

            foreach ($ArrayDeComentarios as $comentario)
            {
                if($usuarioPost == $comentario->getMail())
                {
                    $bandera = true;
                }
            }

            if($bandera)
            {
                foreach ($ArrayDeUsuarios as $usuario)
                {
                    foreach ($ArrayDeComentarios as $comentario) 
                    {
                        if($usuario->getMail() == $comentario->getMail() && $usuario->getMail() == $usuarioPost) 
                        {
                            $grilla .= "<tr>
                            <td>".$usuario->getNombre()."</td>
                            <td>".$usuario->getEdad()."</td>
                            <td>".$comentario->getTitulo()."</td>
                            <td><img src=".$comentario->getPath()." width='100px' height='100px'/></td>
                        </tr>";
                        }
                    }
                }
            }
            
        }
        
        else if(isset($_POST['titulo']))
        {
            $bandera2 = false;

            $tituloPost = $_POST['titulo'];

            foreach ($ArrayDeComentarios as $comentario)
            {
                if($tituloPost == $comentario->getTitulo())
                {
                    $bandera2 = true;
                }
            }

            if($bandera2 == true)
            {
                foreach ($ArrayDeUsuarios as $usuario)
                {
                    foreach ($ArrayDeComentarios as $comentario) 
                    {
                        if($usuario->getMail() == $comentario->getMail())
                        {
                            if($comentario->getTitulo() == $tituloPost)
                            {
                                $grilla .= "<tr>
                                <td>".$usuario->getNombre()."</td>
                                <td>".$usuario->getEdad()."</td>
                                <td>".$comentario->getTitulo()."</td>
                                <td><img src=".$comentario->getPath()." width='100px' height='100px'/></td>
                            </tr>";
                            }
                        }
                    }
                }
            }
        }
        else 
        {
            foreach ($ArrayDeUsuarios as $usuario)
            {
                foreach ($ArrayDeComentarios as $comentario) 
                {
                    if($usuario->getMail() == $comentario->getMail())
                    {
                            $grilla .= "<tr>
                            <td>".$usuario->getNombre()."</td>
                            <td>".$usuario->getEdad()."</td>
                            <td>".$comentario->getTitulo()."</td>
                            <td><img src=".$comentario->getPath()." width='100px' height='100px'/></td>
                        </tr>";
                    }
                }
            }
        }
    }
    
    $grilla .= '</table>';
			
	
	echo $grilla;

?>