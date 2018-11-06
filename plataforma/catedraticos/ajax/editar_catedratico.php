<<<<<<< HEAD
<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $prod_code = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_code"],ENT_QUOTES)));
	$prod_name = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_name"],ENT_QUOTES)));
	$lastname = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_lastname"],ENT_QUOTES)));
	$stock = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_category"],ENT_QUOTES)));
    $price = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_stock"],ENT_QUOTES)));
    $vecindad = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_price"],ENT_QUOTES)));
    $lugar = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_vecindad"],ENT_QUOTES)));
	$fecha = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_lugar"],ENT_QUOTES)));
    
	$id=intval($_POST['edit_id']);
	// UPDATE data into database
    $sql = "UPDATE TB_CATEDRATICO SET ID_CATEDRATICO='".$prod_code."', NOM_CATEDRATICO='".$prod_name."', APE_CATEDRATICO ='".$lastname."', TEL_CATEDRATICO='".$stock."', EMAIL_CATEDRATICO='".$price."', DIR_CATEDRATICO='".$vecindad."', ID_USUARIO='";
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
=======
<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $prod_code = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_code"],ENT_QUOTES)));
	$prod_name = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_name"],ENT_QUOTES)));
	$lastname = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_lastname"],ENT_QUOTES)));
	$stock = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_category"],ENT_QUOTES)));
    $price = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_stock"],ENT_QUOTES)));
    $vecindad = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_price"],ENT_QUOTES)));
    $lugar = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_vecindad"],ENT_QUOTES)));
	$fecha = mysqli_real_escape_string($mysqli,(strip_tags($_POST["edit_lugar"],ENT_QUOTES)));
    
	$id=intval($_POST['edit_id']);
	// UPDATE data into database
    $sql = "UPDATE TB_CATEDRATICO SET ID_CATEDRATICO='".$prod_code."', NOM_CATEDRATICO='".$prod_name."', APE_CATEDRATICO ='".$lastname."', TEL_CATEDRATICO='".$stock."', EMAIL_CATEDRATICO='".$price."', DIR_CATEDRATICO='".$vecindad."', ID_USUARIO='";
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
>>>>>>> cc4eb88a31ef8c9dba47a006788c124426187048
?>