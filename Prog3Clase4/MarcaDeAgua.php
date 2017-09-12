<?php
$im = imagecreatefrompng("fotoUno.png");
$estampa = imagecreatefrompng("fotoDos.png");


// Establecer los márgenes para la estampa y obtener el alto/ancho de la imagen de la estampa
$margen_dcho = 0;
$margen_inf = 0;
$sx = imagesx($estampa);
$sy = imagesy($estampa);


// Copiar la imagen de la estampa sobre nuestra foto usando los índices de márgen y el
// ancho de la foto para calcular la posición de la estampa. 
//imagecopy($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa));

imagecopymerge($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa), 60);

// Imprimir y liberar memoria
header('Content-type: image/png');
imagepng($im);
imagepng($im, 'foto_estampa.png');
imagedestroy($im);

?>