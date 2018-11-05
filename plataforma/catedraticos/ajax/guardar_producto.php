<?php
	/*if (empty($_POST['name'])){
		$errors[] = "Ingresa el nombre del producto.";
	}*/
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos

	// escaping, additionally removing everything that could be (html/javascript-) code
    $semestre = mysqli_real_escape_string($mysqli,(strip_tags($_POST["semestre"],ENT_QUOTES)));
    $fecha = mysqli_real_escape_string($mysqli,(strip_tags($_POST["fecha"],ENT_QUOTES)));
    $parcial1 = mysqli_real_escape_string($mysqli,(strip_tags($_POST["parcial1"],ENT_QUOTES)));
	$parcial2 = mysqli_real_escape_string($mysqli,(strip_tags($_POST["parcial2"],ENT_QUOTES)));
	$actividades = mysqli_real_escape_string($mysqli,(strip_tags($_POST["actividades"],ENT_QUOTES)));
    $examen = mysqli_real_escape_string($mysqli,(strip_tags($_POST["examen"],ENT_QUOTES)));
    $curso = mysqli_real_escape_string($mysqli,(strip_tags($_POST["curso"],ENT_QUOTES)));
    $alumno = mysqli_real_escape_string($mysqli,(strip_tags($_POST["alumno"],ENT_QUOTES)));

	// REGISTRAR INFORMACION A LA BASE DE DATOS
    $sql = "INSERT INTO TB_NOTAS(SEM_NOTA, FECHA_NOTA, PP_NOTA, SP_NOTA, ACT_NOTA, EF_NOTA, ID_CURSO, ID_ALUMNO)
	VALUES ('$semestre','$fecha', '$parcial1', '$parcial2','$actividades','$examen', '$curso', '$alumno')";

	//EJECUTAMOS LA CONSULTA CON UNA FUNCION
	$query = mysqli_query($mysqli,$sql);
	
    // if product has been added successfully
    if ($query) {
        $messages[] = "El producto ha sido guardado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
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
		}
	
?>