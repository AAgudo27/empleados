<?php

require 'conexion.php';
require 'funciones.php';

$empleado=$_REQUEST['codigo'];
$salario=$_REQUEST['salario'];

$pagina=$_REQUEST['pagina'];

CambiarSalario($db,$empleado,$salario);

echo "<a href = 'salario.php'>VOLVER</a> ";



?>