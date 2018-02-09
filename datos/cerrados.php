
<!DOCTYPE html>
<html>
<head>
    <title>Ticketeame</title>
</head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
<div style="text-align: center">
        <div class="container">
  <div class="jumbotron">

    <h1>Tickets cerrados el dia de hoy </h1>      
   
  </div>

</html>
    

</div>
<a class="btn btn-danger btn-lg" href="../index.php">Volver ! </a>

</body>

<?php
	require ("../bd/config.php");  

	//$result = mysql_query("SELECT ticket,f_apertura,estado,usuario_sol,fecha_comp,apoyo_tk,descripcion FROM datos2 WHERE estado != 'cerrado'");  
	$result = mysql_query("SELECT ticket,f_apertura,estado,f_cierre,descripcion,apoyo_tk,fecha_comp,usuario_sol FROM datos2 WHERE estado = 'cerrado' AND f_cierre = date(sysdate()) ");  
//se despliega el resultado 
echo "<br>";
echo '<div align="center">';
echo '<table style=" width:90% ; border:2px solid black" border="1">';  
echo "<tr>";  
echo "<th>N° ticket</th>";  
echo "<th>Fecha de Apertura</th>";  
echo "<th>Estado</th>"; 
echo "<th >Fecha de Cierre</th>"; 
echo "<th>Comentario</th>";
echo "<th>Soporte Interno</th>"; 
echo "<th>Fecha de Compromiso</th>";
echo "<th>Usuario Afectado</th>";
  

 
echo "</tr>";  
while ($row = mysql_fetch_row($result)){   
    echo "<tr>";  
    echo "<td>$row[0]</td>";  
    echo "<td>$row[1]</td>";  
    echo "<td><strong><span style='color:red'>". utf8_encode($row[2]) ."</span></strong></td>";  
   // echo "<td>$row[3]</td>";  
    echo "<td>". utf8_encode($row[3]) ."</td>";
    echo "<td>$row[4]</td>";  
    echo "<td>$row[5]</td>";  
     echo "<td>". utf8_encode($row[6]) ."</td>"; 
     echo "<td>". utf8_encode($row[7]) ."</td>";
    echo "</tr>";  
}  
echo "</table>";  
echo "</div>";
echo "<br>";

//echo "SELECT ticket,f_apertura,estado,f_cierre,descripcion,apoyo_tk,fecha_comp,usuario_sol FROM datos2 WHERE estado = 'cerrado' AND f_cierre = sysdate() ";

?>
