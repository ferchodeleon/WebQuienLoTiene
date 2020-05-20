 <?php

require_once('conexion.php');


	class Agregar{

		function validaInfoNuevoDoc($documento,$fechaN,$fechaE,$cedula,$nombre,$correo){

			$methodo = new Conexion();

			$conexion = $methodo->conectarBD();
	
			if(empty($documento) or empty($fechaN) or empty($fechaE)or empty($cedula)or empty($nombre)or empty($correo)){
	
				echo '<script>
				alert("Por favor completa todos los campos")
				window.location.replace("reportar.html")
				</script>';
			}
	
			$sql = "select * from base where cedulaPersona = '".$documento."'";
	
			$consulta = mysqli_query($conexion,$sql);
	
			if(mysqli_num_rows($consulta)!=0){	
	
				echo   '<script>
						alert("El documento ya se encuentra registrado")
						window.location.replace("reportar.html")
						</script>';
			}else{
	
				Agregar::agregaDocumento($documento,$fechaN,$fechaE,$cedula,$nombre,$correo);
			}
			
			//--Se desconecta la base de datos
			$methodo->desconectarBD($conexion);
		}



		function agregaDocumento($documento,$fechaN,$fechaE,$cedula,$nombre,$correo){

			$methodo = new Conexion();

			//--Se crea la conexión
			$conexion = $methodo->conectarBD();
			//--Se escribe la sentencia sql
			$sql = "insert into base(cedulaPersona,fechaNacimiento,fechaExpedicion,idTipo,cedulaReporta,Nombre, Correo) values
			 ('".$documento."','".$fechaN."','".$fechaE."','1','".$cedula."','".$nombre."','".$correo."')";
		   
			//--Se hace la consulta y se comprueba 
			$consulta = mysqli_query($conexion,$sql);
		  
			if(!$consulta){
	
				$error=mysqli_error($conexion);
	
				echo "<script>
				alert('No se ha logrado insertar los datos, '$error'')
				window.location.replace('index.html')
				</script>";
	
			}else{
	
				echo '<script>
				alert("Se han insertado los datos correctamente")
				window.location.replace("index.html")
				</script>';
	
			}
			//--Se desconecta la base de datos
			$methodo->desconectarBD($conexion);
		}
	
		//--Funcion que consulta informacion de busqueda de documento
	





	}


?>