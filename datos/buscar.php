  
<?php
  require ("../bd/config.php");  

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    if( isset($_POST["searchinput"]))
    {

      $tk = $_POST["searchinput"];
      //echo $tk;



echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
    echo "<title>Ticketeame</title>";
echo "</head>";
     echo '<meta charset="UTF-8">';
       
      echo '  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
       echo ' <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
       echo ' <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
echo "<body>";
echo '<div style="text-align: center">';
     echo '  <div class="container">';
  echo '<div class="jumbotron">';

    echo "<h1>Busqueda de Ticket</h1>   ";
    echo '<h3 style="color: blue"> '. "$tk".' </h3>   ';
   
 echo " </div>";

echo "<div>";



       $result = mysql_query("SELECT ticket,f_apertura,estado,f_cierre,descripcion,apoyo_tk,fecha_comp,usuario_sol FROM datos2 WHERE ticket = $tk ");  
       // echo  "SELECT ticket,f_apertura,estado,f_cierre,descripcion,apoyo_tk,fecha_comp,usuario_sol FROM datos2 WHERE ticket = $tk ";
       
      
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
      }
  if(!$result)
  {

    header("location: ../index.php"); 
  }

 
echo "</tr>";  
while ($row = mysql_fetch_row($result)){   
    echo "<tr>";  
    echo '<td>'."$row[0]".'</td>';  
    echo "<td>$row[1]</td>";  
    echo "<td>". utf8_encode($row[2]) ."</td>";  
   // echo "<td>$row[3]</td>";  
    echo "<td>". utf8_encode($row[3]) ."</td>";
    echo "<td>$row[4]</td>";  
    echo "<td>$row[5]</td>";  
     echo "<td>". utf8_encode($row[6]) ."</td>"; 
     echo "<td>". utf8_encode($row[7]) ."</td>";
    echo "</tr>";  
 
echo "</table>";  
echo "</div>";
echo "<br>";
echo '<a class="btn btn-danger btn-lg" href="../index.php">Volver ! </a>';
echo "<br>";


    }


} 


?>



</div>

</html>
    

</div>


</body>




 

