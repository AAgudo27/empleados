<HTML>
<HEAD> <TITLE> Alejandro cabañas    </TITLE>
</HEAD>
<BODY>
<form name='mi_formulario' action='departamentoManager.php' method='post'>

 <h1>Trabajadores</h1><br><br>



<h3>Cliente</h3>
 <select name='codigo'>
<?php

require 'conexion.php';

$sql="select emp_no,first_name,last_name from employees limit 200;";

$sentencia=mysqli_query($db, $sql);
	
	while($linea=mysqli_fetch_assoc($sentencia)){
		echo '<option value='.$linea['emp_no'].'>'.$linea['first_name'].' '.$linea['last_name'].'</option>';
	}

?>

<input type="hidden" name="pagina" value="1">



<br><br><br>
<input type="submit" value='Mostrar'>

<a href = 'welcome.php'>VOLVER</a>


</FORM>
</BODY>
</HTML>