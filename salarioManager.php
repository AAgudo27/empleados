<?php

require 'conexion.php';
require 'funciones.php';

$empleado=$_REQUEST['codigo'];

$pagina=$_REQUEST['pagina'];

consultarSalario($db,$empleado);

echo "<a href = 'consultarSalarioManager.php'>VOLVER</a> ";
//SacarOrderPedido($conn);


?>