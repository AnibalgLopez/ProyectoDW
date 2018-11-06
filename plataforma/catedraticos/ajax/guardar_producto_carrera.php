<?php
	if (empty($_POST['name'])){
		$errors[] = "Ingresa el nombre de la carrera.";
	} elseif (!empty($_POST['name'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $prod_name = mysqli_real_escape_string($mysqli,(strip_tags($_POST["name"],ENT_QUOTES)));

	// REGISTER data into database
    $sql = "INSERT INTO tb_carrera (NOM_CARRERA) VALUES ('$prod_name')";
    $query = mysqli_query($mysqli,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "La carrera ha sido guardada con éxito.";
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