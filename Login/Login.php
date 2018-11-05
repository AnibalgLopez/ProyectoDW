<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iniciar Sesión</title>

    <!-- Bootstrap core CSS-->
    <link href="fuentes/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="fuentes/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <<body background="img/umgp2.jpg">
  
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="text-center"><h3> Iniciar Sesión</h3></div>
        <div class="card-body">
        <p align="center"> 
        <img border="2" src="img/logoumg.png" width="220" height="150"></p> 



          <form id="formulario" method="post" action="validar.php" >
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="correo" name = "correo" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="correo">Correo Electronico</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="clave" name = "clave" class="form-control" placeholder="Password" required="required">
                <label for="clave">Contraseña</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
            <p align="center"> 
            
            <?php 

            // quitar advertencia en la compilacion y no se vea alterada la pagina
            error_reporting(0);
            session_start(); 
            if ( $_SESSION["error"] == 1 ) { 

               echo ("<br>"."Error incorrecto Email o Contraseña"); 
                // destruir la sesion 
               session_destroy();

            } 

            if ( $_SESSION["error"] == 0 ) { 

              //cuando bote la sesion 
               // destruir la sesion 
              session_destroy();

           } 

            ?>
           
          </form>

         
        </div>
      </div>
    </div>

  </body>

</html>