<?php
	/*if (empty($_POST['name'])){
		$errors[] = "Ingresa el nombre del producto.";
	} elseif (!empty($_POST['name'])){*/
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $semestre = mysqli_real_escape_string($mysqli,(strip_tags($_POST["semestre"],ENT_QUOTES)));
    $fecha = mysqli_real_escape_string($mysqli,(strip_tags($_POST["fecha"],ENT_QUOTES)));
    $parcial1 = mysqli_real_escape_string($mysqli,(strip_tags($_POST["parcial1"],ENT_QUOTES)));
	$parcial2 = mysqli_real_escape_string($mysqli,(strip_tags($_POST["parcial2"],ENT_QUOTES)));
	$actividades = mysqli_real_escape_string($mysqli,(strip_tags($_POST["actividades"],ENT_QUOTES)));
 	// REGISTRAR INFORMACION A LA BASE DE DATOS
    $sql = "INSERT INTO TB_ASIG_CATEDRATICO(SEM_AC, FECHA_AC, HORARIO_AC, ID_CATEDRATICO, ID_CURSO)
	VALUES ('$semestre','$fecha', '$parcial1', '$parcial2','$actividades')";

    $query = mysqli_query($mysqli,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "La asignación ha sido guardada con éxito.";
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