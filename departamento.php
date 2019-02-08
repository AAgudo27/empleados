<HTML>
<HEAD> <TITLE> Alejandro cabañas    </TITLE>
</HEAD>
<BODY>
<form name='mi_formulario' action='cambiarDepartamento.php' method='post'>

 <h1>Trabajador</h1><br><br>

 <select name='codigo'>
<?php

require 'conexion.php';

$sql="select emp_no,first_name,last_name from employees limit 200;";

$sentencia=mysqli_query($db, $sql);
	
	while($linea=mysqli_fetch_assoc($sentencia)){
		echo '<option value='.$linea['emp_no'].'>'.$linea['first_name'].' '.$linea['last_name'].'</option>';
	}

?>
</select>
<h1>Departamento</h1><br><br>

 <select name='dept'>
<?php

require 'conexion.php';

$sql="select distinct dept_no,dept_name from departments;";

$sentencia=mysqli_query($db, $sql);
	
	while($linea=mysqli_fetch_assoc($sentencia)){
		echo '<option value='.$linea['dept_no'].'>'.$linea['dept_name'].' </option>';
	}

?>
</select>

<input type="hidden" name="pagina" value="1">



<br><br><br>
<input type="submit" value='Cambiar'>

<a href = 'welcome.php'>VOLVER</a>


</FORM>
</BODY>
</HTML>