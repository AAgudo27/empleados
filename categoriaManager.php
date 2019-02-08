<?php

require 'conexion.php';
require 'funciones.php';

$empleado=$_REQUEST['codigo'];

$pagina=$_REQUEST['pagina'];

consultarCategoria($db,$empleado);

echo "<a href = 'consultarCategoriaManager.php'>VOLVER</a> ";
//SacarOrderPedido($conn);


?>