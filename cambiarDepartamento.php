<?php

require 'conexion.php';
require 'funciones.php';

$empleado=$_REQUEST['codigo'];
$depar=$_REQUEST['dept'];

$pagina=$_REQUEST['pagina'];

cambiarDepartamento($db,$empleado,$depar);

echo "<a href = 'departamento.php'>VOLVER</a> ";



?>