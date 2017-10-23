<?php
include_once ("clases/AccesoDatos.php");
include_once ("clases/cd.php");

$arraysDeCd =cd::TraerTodoLosCds();

echo" <table class='table  '>
<thead>
    <tr>
    <th>Modificar</th>
    <th>borrar</th>
    <th>Cantante</th>
    <th>titulo</th>
    <th>año</th>
    </tr>
</thead>";



foreach ($arraysDeCd as $cd) {
echo "<tr>
    <td> <a class='btn btn-warning' onClick=modificar($cd->id) >Modificar</a></td>
    <td> <a class='btn btn-danger' onClick=modificar($cd->id)>Borrar</a></td>
    <td>$cd->cantante</td>
    <td>$cd->titulo</td>
    <td>$cd->año</td>
    </tr>";
}
echo" </table>"; 
?>