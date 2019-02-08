<?php
   include('session.php');
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Bienvenido <?php echo $login_session; ?></h1> 
	  
	  
	  <nav class="dropdownmenu">
  <ul>
    <li><a href="departamento.php">Cambio de departamento</a></li>

     <li><a href="consultarDepartamentoManager.php">consultar departamento</a></li><br>
     <li><a href="salario.php">cambio Salario</a></li>      
    
    <li><a href="consultarSalarioManager.php">consultar salario</a></li><br>
     <li><a href="categoria.php">cambiar categoria</a></li>
      <li><a href="consultarCategoriaManager.php">consultar categoria</a></li>
  
  </ul>
</nav>
	  
	  
	  
      <h2><a href = "logout.php">Cerrar Sesion</a></h2>
   </body>
   
</html>