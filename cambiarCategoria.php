<?php

require 'conexion.php';
require 'funciones.php';

$empleado=$_REQUEST['codigo'];
$categoria=$_REQUEST['categoria'];

$pagina=$_REQUEST['pagina'];

 cambiarCategoria($db,$empleado,$categoria);

echo "<a href = 'categoria.php'>VOLVER</a> ";



?>