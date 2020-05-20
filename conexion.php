<?php


class Conexion{

	//--Función que crea y devuelve un objeto de conexión a la base de datos y verifica el estado de la misma. 
	function conectarBD(){ 
		$server = "localhost";
		$usuario = "root";
		$pass = "";
		$BD = "quienlotiene";
		//--variable que guarda la conexión de la base de datos
		$conexion = mysqli_connect($server, $usuario, $pass, $BD); 
		//--Se comprueba si la conexion se realizo
		if(!$conexion){ 
			echo 'No se ha logrado conexion con la base de datos'; 
		} 
		//--Devuelve el objeto de conexión para usarlo en las consultas  
		return $conexion; 
	}  

	//--Desconectar la conexion a la base de datos
	function desconectarBD($conexion){
		//--Cierra la conexión y guarda el estado de la operación en la variable close
		$close = mysqli_close($conexion); 
		//Se comprueba si se ha cerrado la conexión correctamente
		if(!$close){  
			echo 'No se cerro la conexion con la base de datos'; 
		}    
		//devuelve el estado del cierre de conexión
		return $close;         
	}

    //--Funcion que verifica si los datos ya se encuentran registrados


}
?>