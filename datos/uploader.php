<?php
require ("../bd/config.php");  

$target_path = "../datos/";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) { echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";

} else{
echo "Ha ocurrido un error, trate de nuevo!";
}

	$row = 0;  
	$fp = fopen ($_FILES['uploadedfile']['name'],"r");  
	while ($data = fgetcsv ($fp, 1000, ";"))  
	{  
	$num = count ($data);  
	print " <br>"; 
	if($data[1] == "")
	{
		break;
	} 
	$row++;  
	// modificar la cantidad de campor del archivo !!!
	echo "$row- ".$data[1].$data[2].$data[14].$data[15].$data[16].$data[19].$data[31]." "." "." ";  
	
	// validacion, si dato existe
	$Qval="select * from datos2 where ticket = '$data[1]'";
	$validacion = mysql_query($Qval);
	if($validacion){echo 'Esta en la base';}else {echo 'no esta en la base';}
	
	/*
	if($validacion)
	{

		echo "select * from datos2 where ticket = '$data[1]'"."<----validando ";
		
		$Qupdate = "UPDATE datos2 SET f_apertura = '$data[2]', estado = 'reapertura', apoyo_tk = 'Ingrese apoyo', fecha_comp = 'Ingrese fecha' ";

		return;
	}
*/

	// nmodificar la query para que inserte correctamente los datos !!!
	$insertar="INSERT INTO datos2 (ticket,f_apertura,estado,severidad,usuario_crea,Analista_actual,usuario_sol,fecha_comp,apoyo_tk,descripcion) VALUES ('$data[1]','$data[2]','$data[14]','$data[15]','$data[16]','$data[19]','$data[31]','ingrese fecha','Ingrese soporte Interno','Ingrese descripcion')";  
	$res =mysql_query($insertar);  
	echo $insertar;
if($res){echo 'ok';}else {echo 'faLse';}

	}  
	fclose ($fp);  
//header("location: ../index.php");


//---------------------------
//-          Respaldo       -
//...........................
/*
require ("../bd/config.php");  

$target_path = "../datos/";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) { echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";

} else{
echo "Ha ocurrido un error, trate de nuevo!";
}

	$row = 0;  
	$fp = fopen ($_FILES['uploadedfile']['name'],"r");  
	while ($data = fgetcsv ($fp, 1000, ";"))  
	{  
	$num = count ($data);  
	print " <br>"; 
	if($data[1] == "")
	{
		break;
	} 
	$row++;  
	// modificar la cantidad de campor del archivo !!!
	echo "$row- ".$data[1].$data[2].$data[14].$data[15].$data[16].$data[19].$data[31]." "." "." ";  
	// nmodificar la query para que inserte correctamente los datos !!!
	$insertar="INSERT INTO datos2 (ticket,f_apertura,estado,severidad,usuario_crea,Analista_actual,usuario_sol,fecha_comp,apoyo_tk,descripcion) VALUES ('$data[1]','$data[2]','$data[14]','$data[15]','$data[16]','$data[19]','$data[31]','ingrese fecha','Ingrese soporte Interno','Ingrese descripcion')";  
	$res =mysql_query($insertar);  
	echo $insertar;
if($res){echo 'ok';}else {echo 'faLse';}

	}  
	fclose ($fp);  
header("location: ../index.php");

*/


?>	


