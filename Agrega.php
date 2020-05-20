	<?php
//--Se incluye el archivo conexion.php
require_once("conexion.php"); 
require_once("agregar.php");
//--Se comprueba si se ha hecho alguna llamada por POST
if(isset($_POST['cc']) && isset($_POST['fn']) && isset($_POST['fe']) && isset($_POST['cr']) && isset($_POST['nn'])&& isset($_POST['ce'])){
	$documento=$_POST['cc'];
    $fechaN=$_POST['fn'];
	$fechaE=$_POST['fe'];
	$cedula=$_POST['cr'];
    $nombre=$_POST['nn'];
	$correo=$_POST['ce'];

	//--Se crea un objeto de la clase conexion
	$metodo = new Agregar();
	//--Se insertan los datos a la base de datos
	$metodo->validaInfoNuevoDoc($documento,$fechaN,$fechaE,$cedula,$nombre,$correo);
}else{
	
	echo "No hay datos";
}
?>