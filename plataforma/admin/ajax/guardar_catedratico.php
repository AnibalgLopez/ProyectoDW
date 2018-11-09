<?php
	if (empty($_POST['nombre'])){
		$errors[] = "Ingresa el nombre del catedratico.";
	} elseif (!empty($_POST['nombre'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
    // escaping, additionally removing everything that could be (html/javascript-) code
	$nombre = mysqli_real_escape_string($mysqli,(strip_tags($_POST["nombre"],ENT_QUOTES)));
	$apellido = mysqli_real_escape_string($mysqli,(strip_tags($_POST["apellido"],ENT_QUOTES)));
	$telefono = mysqli_real_escape_string($mysqli,(strip_tags($_POST["telefono"],ENT_QUOTES)));
    $correo = mysqli_real_escape_string($mysqli,(strip_tags($_POST["correo"],ENT_QUOTES)));
    $direccion = mysqli_real_escape_string($mysqli,(strip_tags($_POST["direccion"],ENT_QUOTES)));
    $rad = mt_rand(5000,50000);
	// REGISTRAR INFORMACION A LA BASE DE DATOS

	$sql2  = "INSERT INTO `tb_usuario`(`NOM_USUARIO`, `PASS_USUARIO`, `TIPO_USUARIO`, `FECHA_USUARIO`,`ESTADO_USUARIO`) VALUES ('$correo', '$rad', '1', CURRENT_TIMESTAMP,'1')";

	$query2 = mysqli_query($mysqli, $sql2);

	$sqluserid = mysqli_query($mysqli, "SELECT `ID_USUARIO` FROM `tb_usuario` WHERE `NOM_USUARIO` = '$correo'");
    $idusuario = mysqli_fetch_array($sqluserid);
   	$idusuario = $idusuario['ID_USUARIO'];
    
    
    
    
    
    // if catedratico has been added successfully
    if ($query2) {
        $messages[] = "El catedratico ha sido guardada con éxito.";

        	$sql = "INSERT INTO TB_CATEDRATICO(NOM_CATEDRATICO,APE_CATEDRATICO,TEL_CATEDRATICO,EMAIL_CATEDRATICO,DIR_CATEDRATICO,ID_USUARIO)
    VALUES ('$nombre','$apellido', '$telefono', '$correo','$direccion','$idusuario')";

    $query = mysqli_query($mysqli,$sql);

    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
    }
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