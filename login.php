<!doctype html>
<html lang="en">
  <head>
    <title>Universidad</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,900" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
  <?php include 'encabezado.php';?>

    <section class="site-hero site-hero-innerpage overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_1.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <h1>Iniciar Sesión</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->


    <section class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-5 box">

            <form id="formulario" method="post" action="validar.php">
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="usuario">Usuario</label>
                      <input type="text" id="usuario" name="usuario" class="form-control " required="required" autofocus="autofocus">
                    </div>
                  </div>
                  <div class="row mb-5">
                    <div class="col-md-12 form-group">
                      <label for="clave">Contraseña</label>
                      <input type="password" id="clave" name="clave" class="form-control " required="required">
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" value="Iniciar Sesión" class="btn btn-primary">
                    </div>
                  </div>

              <?php 

              // quitar advertencia en la compilacion y no se vea alterada la pagina
              error_reporting(0);
              session_start(); 
              if ( $_SESSION["error"] == 1 ) { 

                echo ("<br>"."Usuario o contraseña incorrectos."); 
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
    </section>

    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>

    
    <script src="js/main.js"></script>
  </body>
</html>