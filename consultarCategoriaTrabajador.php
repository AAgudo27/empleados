<?php
session_start();
require 'conexion.php';
require 'funciones.php';

 $id= $_SESSION['id_user'];

consultarCategoria($db,$id);

echo "<a href = 'welcome2.php'>VOLVER</a> ";



?>