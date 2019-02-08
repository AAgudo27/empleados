<?php


function consultarDepartamento($db,$numeroempleado){

	$sql="select dept_name,dept_emp.dept_no,from_date,to_date from departments,dept_emp where dept_emp.dept_no=departments.dept_no and  emp_no='$numeroempleado';";

	$resultado=mysqli_query($db, $sql);
	$contador=mysqli_num_rows($resultado);

	echo "Trabajador ".$numeroempleado." ";
	nombreApellidosEmpleado($db,$numeroempleado);
	echo "<br>";
	echo $contador. ' Resultados <br>';
		echo "<table border='1'>";
		 echo "<th> Nombre Departamento</th><th>Codigo Departamento</th><th>Fecha Inicial</th><th>Fecha Final</th>";
	        echo '</tr>';
		if (mysqli_num_rows($resultado) > 0) {
	    while($row = mysqli_fetch_assoc($resultado)) {
	    	echo '<tr>';
	        echo "<td>". $row["dept_name"]."</td><td>".$row["dept_no"]."</td><td>".$row['from_date']."</td><td>".$row['to_date']."</td>";
	        echo '</tr>';
	    }
	    echo '</table>';
	    echo '<br>';
	} else {
	    echo "0 results";
	}
}
function nombreApellidosEmpleado($db,$numeroempleado){

	$sql="select first_name,last_name from employees where emp_no='$numeroempleado';";
	$resultado2=mysqli_query($db, $sql);
	$contador=mysqli_num_rows($resultado2);

	if (mysqli_num_rows($resultado2) > 0) {
	    while($row = mysqli_fetch_assoc($resultado2)) {

	    	echo $row["first_name"]."  ".$row["last_name"];
		}
	}

}
function consultarSalario($db,$empleado){
	$sql="select salary,salaries.from_date,salaries.to_date from salaries where emp_no='$empleado';";

	$resultado=mysqli_query($db, $sql);
	$contador=mysqli_num_rows($resultado);

	echo "Trabajador ".$empleado." ";
	nombreApellidosEmpleado($db,$empleado);
	echo "<br>";
	echo $contador. ' Resultados <br>';
		echo "<table border='1'>";
		 echo "<th>Salario</th><th>Fecha Inicio</th><th>Fecha Final</th>";
	        echo '</tr>';
		if (mysqli_num_rows($resultado) > 0) {
	    while($row = mysqli_fetch_assoc($resultado)) {
	    	echo '<tr>';
	        echo "<td>". $row["salary"]."</td><td>".$row["from_date"]."</td><td>".$row['to_date']."</td>";
	        echo '</tr>';
	    }
	    echo '</table>';
	    echo '<br>';
	} else {
	    echo "0 results";
	}
}

function consultarCategoria($db,$empleado){
	$sql="select title,from_date,to_date from titles where emp_no='$empleado';";

	$resultado=mysqli_query($db, $sql);
	$contador=mysqli_num_rows($resultado);

	echo "Trabajador ".$empleado." ";
	nombreApellidosEmpleado($db,$empleado);
	echo "<br>";
	echo $contador. ' Resultados <br>';
		echo "<table border='1'>";
		 echo "<th>Categoria</th><th>Fecha Inicio</th><th>Fecha Final</th>";
	        echo '</tr>';
		if (mysqli_num_rows($resultado) > 0) {
	    while($row = mysqli_fetch_assoc($resultado)) {
	    	echo '<tr>';
	        echo "<td>". $row["title"]."</td><td>".$row["from_date"]."</td><td>".$row['to_date']."</td>";
	        echo '</tr>';
	    }
	    echo '</table>';
	    echo '<br>';
	} else {
	    echo "0 results";
	}
}
function cambiarDepartamento($db,$empleado,$departamento){
	$sql="select dept_emp.dept_no from departments,dept_emp where dept_emp.dept_no=departments.dept_no and  emp_no='$empleado' and to_date='9999-01-01';";

	$aux=mysqli_query($db,$sql);
	$arrayid=mysqli_fetch_array($aux);
	$dept=$arrayid[0];

	//echo $dept;
	//echo $departamento;

		if($departamento==$dept){
			echo "<h3 style='color=red'>Ya Pertenece A Este Departamento.</h3>";
		}
		else{
			$sql2="update dept_emp set to_date=curdate() where to_date='9999-01-01' and emp_no='$empleado';";

			if($sentencia=mysqli_query($db,$sql2)){

				$sql3="insert into dept_emp(emp_no,dept_no,from_date,to_date) values ('$empleado','$departamento',curdate(),'9999-01-01');";
				//var_dump($sql3);

					if($sentencia2=mysqli_query($db,$sql3)){
						mysqli_commit($db);

						echo "<h3 style='color=green'> Trabajador ".$empleado." ";
						nombreApellidosEmpleado($db,$empleado);
						echo " ha cambiado de departamento con existo a ".$departamento." ";
						nombreDepartamento($db,$departamento);
						echo "</h3>";
					}
					else{
						echo "Ya ha pertenecido a este departamento y no puede volver <br>";
						mysqli_rollback($db);
					}
			}
			else{
				//echo "error1";
				mysqli_rollback($db);
			}
		}

}
function nombreDepartamento($db,$departamento){
	$sql="select dept_name from departments where dept_no='$departamento';";
	$resultado2=mysqli_query($db, $sql);
	$contador=mysqli_num_rows($resultado2);

	if (mysqli_num_rows($resultado2) > 0) {
	    while($row = mysqli_fetch_assoc($resultado2)) {

	    	echo $row["dept_name"];
		}
	}
}
function CambiarSalario($db,$empleado,$salario){
	$sql="select max(from_date) from salaries where emp_no='$empleado'";

	$aux=mysqli_query($db,$sql);
	$arrayid=mysqli_fetch_array($aux);
	$fecha=$arrayid[0];

	$sql2="select curdate()";

	$aux2=mysqli_query($db,$sql2);
	$arrayid2=mysqli_fetch_array($aux2);
	$fechaactual=$arrayid2[0];

	if($fecha==$fechaactual){
		echo "No se puede Cambiar de Salario el mismo dia, Espera a mañana <br>";
	}
	else{
		$sql3="update salaries set to_date=curdate() where to_date='9999-01-01' and emp_no='$empleado';";

		if($sentencia=mysqli_query($db,$sql3)){
			$sql4="insert into salaries(emp_no,salary,from_date,to_date) values ('$empleado','$salario',curdate(),'9999-01-01');";

			if($sentencia2=mysqli_query($db,$sql4)){

				mysqli_commit($db);

				echo "<h3>Salario Cambiado con existo a ";
				nombreApellidosEmpleado($db,$empleado);
				echo "</h3>";
			}
			else{
				mysqli_rollback($db);
			}
		}
		else{
			mysqli_rollback($db);
		}
	}
}
function cambiarCategoria($db,$empleado,$categoria){
	$sql="select max(from_date) from titles where emp_no='$empleado'";

	$aux=mysqli_query($db,$sql);
	$arrayid=mysqli_fetch_array($aux);
	$fecha=$arrayid[0];

	$sql2="select curdate()";

	$aux2=mysqli_query($db,$sql2);
	$arrayid2=mysqli_fetch_array($aux2);
	$fechaactual=$arrayid2[0];

	$sql3="select title from titles where emp_no='$empleado' and to_date='9999-01-01'";

	$aux3=mysqli_query($db,$sql3);
	$arrayid3=mysqli_fetch_array($aux3);
	$categoriaactual=$arrayid3[0];

	if($fecha==$fechaactual && $categoriaactual==$categoria){
		echo "No se puede cambiar a la misma Categoria el mismo dia. Espera a mañana";
	}
	else{
		$sql4="update titles set to_date=curdate() where to_date='9999-01-01' and emp_no='$empleado';";

		if($sentencia=mysqli_query($db,$sql4)){
			$sql5="insert into titles(emp_no,title,from_date,to_date) values ('$empleado','$categoria',curdate(),'9999-01-01');";

				if($sentencia2=mysqli_query($db,$sql5)){
				mysqli_commit($db);

				echo "<h3>Categoria Cambiadoa con existo a ";
				nombreApellidosEmpleado($db,$empleado);
				echo "</h3>";
				}
				else{
					mysqli_rollback($db);
				}

		}
		else{
			mysqli_rollback($db);
		}

	}

}




?>