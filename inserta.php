//<?php
//--Se incluye el archivo conexion.php
require_once("conexion.php"); 
require_once("insertar.php");
//--Se comprueba si se ha hecho alguna llamada por POST
if(isset($_POST['numero']) && isset($_POST['nombre']) && isset($_POST['apellido'])&& isset($_POST['cel']) && isset($_POST['correo'])){
	$numero=$_POST['numero'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$cel=$_POST['cel'];
	$correo=$_POST['correo'];
	//--Se crea un objeto de la clase conexion
	$metodo = new Inserta();
	//--Se insertan los datos a la base de datos
	$metodo->validaInfoRegistro($numero, $nombre, $apellido, $cel, $correo);
}else{

	echo "No fue posible enviar los datos";
}
?>