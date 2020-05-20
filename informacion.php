<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quien Lo Tiene</title>
  <!--scrollreview-->
  <script src="https://unpkg.com/scrollreveal"></script>
  <!--fuentes titillium web-->
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
  <!--bootstrap-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!--Estilos-->
  <link rel="stylesheet" href="css/styles.css">
  <link rel="icon" href="logo.png" >
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body class="letra">
  <!--se crea el navegador con nav-->
  <nav class="navbar navbar-expand-sm navbar navbar-dark bg-dark p-3">
    <!--dentro del nav se crea una etiqueta para gragar un logo-->
    <a href="" class="navbar-brand ml-5">
      <img src="imagen/logo.png" alt="imagen logo">
    </a>
    <!--se crea un boton para hacer un menu desolegable haburguesa el cual llma al id de donde va a realizar el colapso-->
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#firstnav">
      <!--se crea un span donde aparece el icono de hambueguesa-->
      <span class="navbar-toggler-icon"></span>
    </button>
    <!--este contenedor crea un marco imbicible para encerrar dentro de el el siguiente cod-->
    <div class="container">
      <!--se crea un div donde se agragan las clases para poder hacer el colapso, con un id que identifica la lista que se despliega -->
      <div class="collapse navbar-collapse" id="firstnav">
        <!--se crea la lista desplegable  con la clase navbar con margen a la izauierda automatico-->
        <ul class="navbar-nav ml-auto">
          <li><a class="nav-link " href="index.html">Inicio</a></li>
          <li><a class="nav-link " href="buscar.php">Buscar</a></li>
          <li><a class="nav-link " href="reportar.html">Reportar</a></li>
          <li><a class="nav-link " href="recomendaciones.html">Recomendaciones</a></li>
        </ul>
      </div>
    </div>
  </nav>


  <form action="" method="POST" class="text-dark">
    <div class="container col-md-6">
      <h3 class="text-center pt-4">Felicidades deseamos que recuperes tu documento ya falta poco !!</h3><br>
      <div class="form-row">
        <div class="form-group col-md-12">
          <!--Tipo Documento-->
          <label for="Tdocumento">Tipo De Documento</label>
          <select id="text" class="form-control" name="tipo">
            <option selected>Escoger:</option>
            <option value="1">Cedula De Ciudadania</option>
            <option value="2">Tarjeta de Identidad</option>
          </select>
        </div>
        <!--Numero Documento-->
        <div class="form-group col-md-12">
          <label for="ndocumento">Ingrese numero de su documento</label><br>
          <input type="number" class="form-control" id="ndocumento" name="numero">

        </div>
        <!--Fecha De Nacimiento-->

        <div class="container text-center d-flex justify-content-center align-items-center p-5">
          <button type="submit" class="btn btn-primary btn-lg">Ver</button>

        </div>
      </div>
    </div>
    </div>
  </form>

  <?php

       
        error_reporting(0);
        require_once('conexion.php');


        class Informa{

            function Ejecuta(){

                

                            
         if(isset($_POST['numero'])){

         $numero = $_POST['numero'];

            }else{
         echo "";
         }

    
                $methodo = new Conexion();
        
                $conexion = $methodo->conectarBD();
    
                $sql  = "select cedulaReporta, Nombre, Correo from base where cedulaPersona ='".$numero."'";
    
                $conectar = mysqli_query($conexion,$sql);

                if(mysqli_num_rows($conectar)!=0){

                    $fila = mysqli_fetch_row($conectar);

                    echo

                    '<div class="container">
                       <p><center>Esta persona encontro tu documento</center></p>           
                     <table class="table table-bordered">
                        <thead>
                         <tr>
                         <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        </tr>
                      </thead>
                     <tbody>    
                     <tr>
                     <td>'.$fila[0].'</td>
                    <td>'.$fila[1].'</td>
                    <td>'.$fila[2].'</td>
                    </tr>
                     </tbody>
                     </table>
                    </div>';
                    


                  $methodo->desconectarBD($conexion);

                    
            }else{

                echo "";  
                
            }
                
            }
               
        }
    
    ?>


    <div>  
    
    <?php

        $mensaje = new Informa;
       echo $mensaje->Ejecuta();
    
?>
    

  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>Nosotros</h6>
          <p class="text-justify">Esta plataforma web permite gestionar la busqueda y el reporte de Documentos perdidos
            en colaboracion con el ciudadano que decea realizar el reporte de algun tipo de documento que se ha
            encontrado, esta plataforma no se hace responsable del tratamiento de los datos que aqui se introducen, se
            garantiza el total tratamiento de datos de los documentos aqui reportados</p>
        </div>
        <!--utilizar grid-->
        <div class="col-xs-6 col-md-3">
          <h6>links de Ayuda</h6>
          <ul class="footer-links">
            <li><a href="https://www.fiscalia.gov.co/colombia/">Fiscalia</a></li>
            <li><a href="https://www.policia.gov.co//">Policia Nacional</a></li>
            <li><a href="https://www.procuraduria.gov.co/portal/">Procuraduria</a></li>
            <li><a href="https://www.registraduria.gov.co/">Registraduria general</a></li>

          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="index.html">Volver</a></li>
            <li><a href="buscar.php">Buscar</a></li>
            <li><a href="reportar.html">Reportar</a></li>
            <li><a href="recomendaciones.html">Recomendaciones</a></li>
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Todos los derechos resevados :
            <a href="#">J Contreras,D Vargas,F Leon</a>.
          </p>
        </div>
        <!--redes sociales-->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!--Scrips-->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</body>
</html>

    