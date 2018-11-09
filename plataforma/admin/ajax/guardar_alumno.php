<?php

	if (empty($_POST['name'])){
		$errors[] = "Ingresa el nombre del Alumno.";
	} elseif (!empty($_POST['name'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $prod_code = mysqli_real_escape_string($mysqli,(strip_tags($_POST["code"],ENT_QUOTES)));
    $prod_name = mysqli_real_escape_string($mysqli,(strip_tags($_POST["name"],ENT_QUOTES)));
    $lastname = mysqli_real_escape_string($mysqli,(strip_tags($_POST["lastname"],ENT_QUOTES)));
	$prod_ctry = mysqli_real_escape_string($mysqli,(strip_tags($_POST["category"],ENT_QUOTES)));
	$stock = mysqli_real_escape_string($mysqli,(strip_tags($_POST["stock"],ENT_QUOTES)));
    $price = mysqli_real_escape_string($mysqli,(strip_tags($_POST["price"],ENT_QUOTES)));
    $rad = mt_rand(5000,50000);
    

	// REGISTER data into database
    $sql2 = "INSERT INTO `tb_usuario`(`NOM_USUARIO`, `PASS_USUARIO`, `TIPO_USUARIO`, `FECHA_USUARIO`,`ESTADO_USUARIO`) VALUES ('$prod_ctry', '$rad', '2', CURRENT_TIMESTAMP,'1')";

    $query2 = mysqli_query($mysqli, $sql2);

    $sqluserid = mysqli_query($mysqli, "SELECT `ID_USUARIO` FROM `tb_usuario` WHERE `NOM_USUARIO` = '$prod_ctry'");
    $idusuario = mysqli_fetch_array($sqluserid);
   	$idusuario = $idusuario['ID_USUARIO'];

    // if product has been added successfully
    if ($query2) {
        $messages[] = "Se ha guardado con éxito el usuario.";

         $sql = "INSERT INTO `tb_alumnos`(`NOM_ALUMNO`, `APE_ALUMNO`, `TEL_ALUMNO`,`EMAIL_ALUMNO`,`DIR_ALUMNO`,`ID_CARRERA`,`ID_USUARIO`) VALUES ('$prod_code', '$prod_name', '$lastname', '$prod_ctry', '$stock', '$price', '$idusuario' )";

         $query = mysqli_query($mysqli, $sql);
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
    }

	if ($query) {
        $messages[] = "Se ha guardado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
    }  

		
	} else 
	{
		$errors[] = "desconocido.";
	}



if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>