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
    

     <li><a href="consultarDepartamentotrabajador.php">consultar departamento</a></li>
       
    
    <li><a href="consultarSalarioTrabajador.php">consultar salario</a></li>
     
      <li><a href="consultarCategoriaTrabajador.php">consultar categoria</a></li>
  
  </ul>
</nav>
	  
	  
	  
      <h2><a href = "logout.php">Cerrar Sesion</a></h2>
   </body>
   
</html>