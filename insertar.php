<?php

require_once('conexion.php');


    class Inserta{

        function validaInfoRegistro($numero, $nombre, $apellido, $cel, $correo){

            
        $methodo = new Conexion();

            //--Se crea la conexión
            $conexion = $methodo->conectarBD();
            
    
            if(empty($numero) or empty($nombre) or empty($apellido) or empty($cel) or empty($correo)){
    
                echo '<script>
                alert("Por favor completa todos los campos")
                window.location.replace("registrar.php")
                </script>';
            }
    
           //--Se escribe la sentencia sql
            $sql  = "select * from usuariobuscan where cedulaBusca = '".$numero."'";
            
            $consulta = mysqli_query($conexion,$sql);
    
            if(mysqli_num_rows($consulta)!=0){	
    
                echo    '<script>
                        alert("Tu usuario ya existe")
                        window.location.replace("registrar.html")
                        </script>';
    
            }
    
            $sql2  = "select * from usuariobuscan where email = '".$correo."'";
            $consulta = mysqli_query($conexion,$sql2);
    
            if(mysqli_num_rows($consulta)!=0){
    
                echo    '<script>
                        alert("Tu correo ya existe")
                        window.location.replace("registar.html")
                        </script>';
    
            }else{
    
                Inserta::insertar($numero, $nombre, $apellido, $cel, $correo);
            }
            
            //--Se desconecta la base de datos
            $methodo->desconectarBD($conexion);
        }


            	//--Funcion que inserta la informacion a la base de datos

	function insertar($numero, $nombre, $apellido, $cel, $correo){

        $methodo = new Conexion();

		//--Se crea la conexión
		$conexion = $methodo->conectarBD();
		//--Se escribe la sentencia sql
		$sql = "insert into usuariobuscan(cedulaBusca,nombre,apellido,celular,email) values ('".$numero."','".$nombre."','".$apellido."','".$cel."','".$correo."')";


		//--Se hace la consulta y se comprueba 
		$consulta = mysqli_query($conexion,$sql);

		if(!$consulta){

			$error=mysqli_error($conexion);

			echo "<script>
			alert('No se ha logrado insertar los datos, '$error'')
			window.location.replace('registrar.html')
			</script>";

		}else{

			echo '<script>
			alert("Se han insertado los datos correctamente")
			window.location.replace("informacion.php")
            </script>';
            
            

		}
		//--Se desconecta la base de datos
		$methodo->desconectarBD($conexion);
    }
    
}

?>