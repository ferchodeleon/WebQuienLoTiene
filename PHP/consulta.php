<?php
//--Se incluye el archivo conexion.php
require_once("conexion.php"); 
require_once("consultar.php");
//--Se comprueba si se ha hecho alguna llamada por POST
if(isset($_POST['cc']) && isset($_POST['fn'])){
	$numero=$_POST['cc'];
	$fecha=$_POST['fn'];
	//--Se crea un objeto de la clase conexion
	$metodo = new Consultar();
	//--Se insertan los datos a la base de datos
	$metodo->consulta($numero,$fecha);
}else{
	
	echo "No hay datos";
}
?>