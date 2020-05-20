<?php

require_once('conexion.php');

	class Consultar{

		function consulta($numero, $fecha){

			$methodo = new Conexion();
			//--Se crea la conexión
			$conexion = $methodo->conectarBD();
			//--Se escribe la sentencia sql
			$sql = "select * from base where cedulaPersona = '".$numero."' and fechaNacimiento= '".$fecha."'";
	
			//--Se hace la consulta y se comprueba 
			$consulta = mysqli_query($conexion,$sql);
			if(mysqli_num_rows($consulta)!=0){
	
				echo '<script>
				alert("Felicidades!! Su documento se encuentra registrado en nuestra base")
				window.location.replace("registrar.html")
				</script>';
				
			}else{
	
				echo '<script>
				alert("No se encuentra el documento" '.mysqli_error($conexion).')
				window.location.replace("buscar.html")
				</script>';
	
			}
			//--Se desconecta la base de datos
			$methodo->desconectarBD($conexion);
		}

	}



?>