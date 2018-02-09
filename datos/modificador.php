<?php
	require ("../bd/config.php");  
$ftk = $_POST["ntk"];
print_r($link);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if( isset($_POST["comentarios"]) && isset($_POST["ntkf"]) && isset($_POST["btn"]) && isset($_POST["fechaComp"])&&isset($_POST["apoyo"]) ) 
    {
    	$ftk = $_POST["ntk"];
		$com = $_POST["comentarios"];
		$ntkff = $_POST["ntkf"];
		$btn = $_POST["btn"];
		$fechaComp = $_POST["fechaComp"];
		$apoyo = $_POST["apoyo"];
echo $btn;
		if( $btn == "Actualizar comentarios de Tk")
	{
		mysql_query("UPDATE datos2 SET descripcion = '$com', fecha_comp = '$fechaComp' , apoyo_tk = '$apoyo'  WHERE ticket = '".trim($ntkff)."' ");
		echo "UPDATE datos2 SET descripcion = '$com' WHERE ticket = '".trim($ntkff)."' ";
		echo '<script>alert("Comentario actualizado")</script>';
	header("location: ../index.php");

	}elseif ($btn == "Cerrar Tk  XD!") 
	
	{
		$res =mysql_query("UPDATE datos2 SET descripcion = '$com' , estado = 'cerrado' , f_cierre = sysdate() WHERE ticket = '".trim($ntkff)."' ");
		echo '<script>alert("Muy bien , un ticket cerrado mas !!")</script>';
		//echo  "UPDATE datos2 SET descripcion = '$com' , estado = 'cerrado' , f_cierre = sysdate WHERE ticket = '".trim($ntkff)."' ";
		header("location: ../index.php");
		
		

	}

		

      
           
           return;
       }
    }  










	?>

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
<body style="text-align: center">
<div >
		


	<div class="container">
  <div class="jumbotron">

    <h1>Administrador de ticket's</h1>      
    <p>En esta seccion podras cerrar o actualizar la informacion de tus ticket's</p>
  </div>
 
  <label>Numero de ticket con el que estas trabajando <h4><label style="color: blue"><?php echo $ftk ?></label></h4></label>
  <form method="POST"> 
  <input type="hidden" name="ntkf" id="ntkf" value="<?php echo $ftk ?>">
 
</div>

<div >
	<label> Fecha de Compromiso </label><input type="date" name="fechaComp">
	<label> Soporte para Ticket </label> <input type="text" name="apoyo">
	<br>
	<br>
	<textarea  id="comentarios" name="comentarios"  rows="6" cols="120" placeholder="Ingresa tus comentarios para actualizar o cerrar tk "></textarea>
	<br>
	<br>
	<a class="btn btn-danger btn-lg" href="../index.php">Volver ! </a>
	<input type="submit" class="btn btn-primary btn-lg " name="btn" id="btn" value="Actualizar comentarios de Tk">

	<input type="submit" class="btn btn-success btn-lg" name="btn" id="btn" value="Cerrar Tk  XD!">
 
</div>

</form>


</html>
	

</div>

</body>
