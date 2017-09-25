<?php
// retorna una tabla de productos con la imagen correspondiente de cada producto, recomendacion:guardar fotos png o jpg
// guardar foto con el nombre del producto;

include_once "producto.php";
include_once "archivo.php";


	$ArrayDeProductos = Archivo::TraerListaProductos();

	$grilla = '<table class="table">
				<thead style="background:rgb(14, 26, 112);color:#fff;">
					<tr>
						<th>  NOMBRE </th>
						<th>  PRECIO     </th>
						<th>  FOTO       </th>
					</tr>  
				</thead>';   	

	foreach ($ArrayDeProductos as $prod)
	{
	
		$grilla .= "<tr>
						<td>".$prod->getNombre()."</td>
						<td>".$prod->getPrecio()."</td>
						<td><img src=".$prod->getPath()." width='100px' height='100px'/></td>
					</tr>";	
	}
	$grilla .= '</table>';		
	
	echo $grilla;

?>