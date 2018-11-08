<?php
	if (empty($_POST['name'])){
		$errors[] = "Ingresa el nombre del producto.";
	} elseif (!empty($_POST['name'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $prod_code = mysqli_real_escape_string($mysqli,(strip_tags($_POST["code"],ENT_QUOTES)));
    $prod_name = mysqli_real_escape_string($mysqli,(strip_tags($_POST["name"],ENT_QUOTES)));
    $lastname = mysqli_real_escape_string($mysqli,(strip_tags($_POST["lastname"],ENT_QUOTES)));
	$prod_ctry = mysqli_real_escape_string($mysqli,(strip_tags($_POST["category"],ENT_QUOTES)));
	$stock = mysqli_real_escape_string($mysqli,(strip_tags($_POST["stock"],ENT_QUOTES)));
    $price = mysqli_real_escape_string($mysqli,(strip_tags($_POST["price"],ENT_QUOTES)));
    $vecindad = mysqli_real_escape_string($mysqli,(strip_tags($_POST["vecindad"],ENT_QUOTES)));
    $lugar = mysqli_real_escape_string($mysqli,(strip_tags($_POST["lugar"],ENT_QUOTES)));

	// REGISTER data into database
    $sql = "INSERT INTO TB_NOTAS(SEM_NOTA, FECHA_NOTA, PP_NOTA, SP_NOTA, ACT_NOTA, EF_NOTA, ID_CURSO, ID_ALUMNO) VALUES ('$prod_code','$prod_name', '$lastname', '$prod_ctry','$stock','$price', '$vecindad', '$lugar')";
    $query = mysqli_query($mysqli,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "El producto ha sido guardado con éxito.";
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