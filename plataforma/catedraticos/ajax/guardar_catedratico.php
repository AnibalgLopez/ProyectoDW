<?php
	/*if (empty($_POST['name'])){
		$errors[] = "Ingresa el nombre del catedratico.";
	} elseif (!empty($_POST['name'])){*/
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
    // escaping, additionally removing everything that could be (html/javascript-) code
    
	$nombre = mysqli_real_escape_string($mysqli,(strip_tags($_POST["nombre"],ENT_QUOTES)));
	$apellido = mysqli_real_escape_string($mysqli,(strip_tags($_POST["apellido"],ENT_QUOTES)));
	$telefono = mysqli_real_escape_string($mysqli,(strip_tags($_POST["telefono"],ENT_QUOTES)));
    $correo = mysqli_real_escape_string($mysqli,(strip_tags($_POST["correo"],ENT_QUOTES)));
    $direccion = mysqli_real_escape_string($mysqli,(strip_tags($_POST["direccion"],ENT_QUOTES)));
    $id_usuario= mysqli_real_escape_string($mysqli,(strip_tags($_POST["id_usuario"],ENT_QUOTES)));
	// REGISTRAR INFORMACION A LA BASE DE DATOS
    
    $sql = "INSERT INTO TB_CATEDRATICO(NOM_CATEDRATICO,APE_CATEDRATICO,TEL_CATEDRATICO,EMAIL_CATEDRATICO,DIR_CATEDRATICO,ID_USUARIO)
    VALUES ('$nombre','$apellido', '$telefono', '$correo','$direccion','$id_usuario')";
    
    $query = mysqli_query($mysqli,$sql);
    
    // if catedratico has been added successfully
    if ($query) {
        $messages[] = "El catedratico ha sido guardada con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
    }
		
	//} 
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