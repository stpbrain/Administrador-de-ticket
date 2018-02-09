
<!-- inicio de html -->

<!DOCTYPE html>
<html>
<head>
	<title>Ticketeame</title>
</head>
  		<meta charset="UTF-8">
        <link href="css/style.css" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
<div style="text-align: center">
		<div>
		<h1>Inicio del sistema de Gestion de ticket's</h1>
		</div>
		<br>


	<div class="row">
		<form method="POST" action="datos/buscar.php">
		 <div class="col-md-5">
		    <label  for="searchinput">Buscar Ticket</label>
		    <input id="searchinput" name="searchinput" type="search" placeholder="N° tk"  >
		    <input class="btn btn-success" type="submit" name="Buscar" value="Buscar"> 
				</form>
			    	<a href="datos/cerrados.php" name="cerrados"  class="btn btn-info">Tk's Cerrados Hoy</a>
			    
		  </div>
		<strong class="col-md-1">|</strong>
		  
		  <div class="col-md-6">
		  <label  for="ingresoArchivo" class="col-md-3">Ingrese Archivo</label>
	 	
	 	<form enctype="multipart/form-data" action="datos/uploader.php" method="POST">
		    <input  name="uploadedfile" class="input-file col-md-6" type="file"> 
		   	<!-- boton para subir -->
		    <input type="submit" name="enviar"  value="Importar" class="btn btn-warning " />
		</form>

		  </div>
	</div>

	<br>


<!-- Inicio del Espacio para visualizar los ticket's  al inicio de la pag  que traiga los ticket que estan en estado abierto-->




</html>
	

</div>

</body>

<?php
	require ("bd/config.php");  

	//$result = mysql_query("SELECT ticket,f_apertura,estado,usuario_sol,fecha_comp,apoyo_tk,descripcion FROM datos2 WHERE estado != 'cerrado'");  
	$result = mysql_query("SELECT ticket,f_apertura,estado,descripcion,apoyo_tk,fecha_comp,usuario_sol FROM datos2 WHERE estado != 'cerrado'");  
//se despliega el resultado 

echo '<div align="center">';
echo '<table style=" width:90% ; border:2px solid black" border="1">';  
echo "<tr>";  
echo "<th>N° ticket</th>";  
echo "<th>Fecha de Apertura</th>";  
echo "<th>Estado</th>"; 
//echo "<th  >Analista</th>"; 
echo "<th>Comentario</th>";
echo "<th>Soporte Interno</th>"; 
echo "<th>Fecha de Compromiso</th>";
echo "<th>Usuario Afectado</th>";
  

 
echo "</tr>";  
while ($row = mysql_fetch_row($result)){   
    echo "<tr>";  
    echo '<td><form action="datos/modificador.php" method="POST"><input type="submit" data-toggle="modal" id="ntk" name="ntk" data-target="#myModal" value=" '.$row[0].' "></form></td>';  
    echo "<td>$row[1]</td>";  
    echo "<td>". utf8_encode($row[2]) ."</td>";  
   // echo "<td>$row[3]</td>";  
    echo "<td>". utf8_encode($row[3]) ."</td>";
   echo "<td>". utf8_encode($row[4]) ."</td>"; 
    echo "<td>". utf8_encode($row[5]) ."</td>";  
     echo "<td>". utf8_encode($row[6]) ."</td>"; 
    echo "</tr>";  
}  
echo "</table>";  
echo "</div>";


?>





