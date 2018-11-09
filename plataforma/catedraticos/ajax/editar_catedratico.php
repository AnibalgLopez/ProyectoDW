
<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
	$nombre = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_code"],ENT_QUOTES)));
	$apellido = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_name"],ENT_QUOTES)));
	$telefono = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_lastname"],ENT_QUOTES)));
    $correo = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_category"],ENT_QUOTES)));
    $direccion = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_stock"],ENT_QUOTES)));
    $id_usuario= mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_id"],ENT_QUOTES)));
	
    
	$id=intval($_POST['edit_id']);
	// UPDATE data into database
    $sql = "UPDATE TB_CATEDRATICO SET NOM_CATEDRATICO='".$nombre."', APE_CATEDRATICO ='".$apellido."', TEL_CATEDRATICO='".$telefono."', EMAIL_CATEDRATICO='".$correo."', DIR_CATEDRATICO='".$direccion."', ID_USUARIO='".$id_usuario."' WHERE ID_CATEDRATICO='".$id."' ";
    $query = mysqli_query($mysqli,$sql);
    // if catedratico has been added successfully
    if ($query) {
        $messages[] = "El Catedratico  ha sido actualizado con éxito.";
    } else {
        $errors[] = "Lo sentimos, la actualización falló. Por favor, regrese y vuelva a intentarlo.";
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