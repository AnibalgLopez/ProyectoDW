<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $semestre = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_code"],ENT_QUOTES)));
	$fecha = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_name"],ENT_QUOTES)));
	$parcial1 = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_lastname"],ENT_QUOTES)));
	$parcial2 = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_category"],ENT_QUOTES)));
    $actividades = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_stock"],ENT_QUOTES)));
    $examen = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_price"],ENT_QUOTES)));
    $curso = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_vecindad"],ENT_QUOTES)));
	$alumno = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_lugar"],ENT_QUOTES)));
    
	$id=intval($_POST['edit_id']);
	// UPDATE data into database
    $sql = "UPDATE TB_NOTAS SET SEM_NOTA='".$semestre."', FECHA_NOTA='".$fecha."', PP_NOTA ='".$parcial1."', SP_NOTA='".$parcial2."', ACT_NOTA='".$actividades."', EF_NOTA='".$examen."', ID_CURSO='".$curso."', ID_ALUMNO='".$alumno."' WHERE ID_NOTA='".$id."' ";
    $query = mysqli_query($mysqli,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "La nota ha sido actualizada con éxito.";
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