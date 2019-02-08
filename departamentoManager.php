<?php

require 'conexion.php';
require 'funciones.php';

$empleado=$_REQUEST['codigo'];

$pagina=$_REQUEST['pagina'];

consultarDepartamento($db,$empleado);

echo "<a href = 'consultarDepartamentoManager.php'>VOLVER</a> ";
//SacarOrderPedido($conn);


?>