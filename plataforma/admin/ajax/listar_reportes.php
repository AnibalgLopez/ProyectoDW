<?php

error_reporting(0);	
	/* Connect To Database*/
	require_once ("../conexion_reportes.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="tb_alumnos";
	$campos="*";
	$sWhere=" tb_alumnos.NOM_ALUMNO LIKE '%".$query."%' OR tb_alumnos.APE_ALUMNO LIKE '%".$query."%' OR tb_alumnos.ID_ALUMNO LIKE '%".$query."%' ";
	$sWhere.=" order by tb_alumnos.ID_ALUMNO";
	
	

	
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	//main query to fetch the data
	$query = mysqli_query($con,"SELECT  $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data

	$query2 = mysqli_query ($con,"SELECT tb_carrera.NOM_CARRERA, tb_carrera.ID_CARRERA FROM tb_alumnos INNER JOIN tb_carrera on tb_alumnos.ID_CARRERA=tb_carrera.ID_CARRERA order by tb_alumnos.ID_ALUMNO "); 
	$query3 = mysqli_query ($con,"SELECT tb_usuario.ID_USUARIO, tb_usuario.NOM_USUARIO FROM tb_alumnos INNER JOIN tb_usuario on tb_alumnos.ID_USUARIO=tb_usuario.ID_USUARIO order by tb_alumnos.ID_ALUMNO");

	
	// iniciamos un array donde vamos a meter lo datos de la tabla TB_CARRERA
	$id_carr = array ();
	$carreras = array ();
	$finales2=0;


// iniciamos un array donde vamos a meter lo datos de la tabla TB_USUARIO
	$id_usu = array ();
	$usuario3 = array ();
	$finales3=0;
	
	// CONSULTAMOS LOS DATOS DE LA TABLA TB_CARRERA Y LOS GUARDAOS EN EL ARREGLO
    while($row = mysqli_fetch_array($query2)){
	$id_carr [$finales2] =  $row['ID_CARRERA'];
	$carreras [$finales2] = $row['NOM_CARRERA'];
	$finales2++;
	}

	// CONSULTAMOS LOS DATOS DE LA TABLA TB_USUARIO Y LOS GUARDAOS EN EL ARREGLO
	while($row2 = mysqli_fetch_array($query3)){
		$id_usu [$finales3] =   $row2['ID_USUARIO'];
		$usuario3 [$finales3] = $row2['NOM_USUARIO'];
		$finales3++;
		}
	
			
	
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
					    <th> <a> No. </a></th>
						<th><a>Nombre </a></th>
						<th><a>Apellido </a></th>
						<th><a>Telefono </a></th>
						<th><a>Email </a></th>
						<th><a>Direccion </a></th>
						<th><a>Carrera </a></th>
						<th><a> Usuario </a> </th>
						<th></th>
					</tr>
				</thead>
				<tbody>	

						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							
							$alumno_id=$row['ID_ALUMNO'];
							$alumno_name=$row['NOM_ALUMNO'];
							$alumno_ape=$row['APE_ALUMNO'];
							$alumno_telefono=$row['TEL_ALUMNO'];
							$alumno_email=$row['EMAIL_ALUMNO'];
							$alumno_direccion=$row['DIR_ALUMNO'];
							$alumno_carrera2=$row['ID_CARRERA'];
							$alumno_id_usuario=$row['ID_USUARIO'];
							$finales++;
                           
						?>	

						
						<tr class="<?php echo $text_class;?>">
					     	
                          <td class='text-center' ><?php echo $alumno_id;?></td>
							<td ><?php echo $alumno_name;?></td>
							<td ><?php echo $alumno_ape;?></td>
							<td ><?php echo $alumno_telefono;?></td>
							<td ><?php echo $alumno_email;?></td>
							<td ><?php echo $alumno_direccion;?></td>
							
							<?php  
							 for ($i = 1; $i< count($id_carr);$i++ ){

								if ($alumno_carrera2 == $id_carr[$i] ) { ?>

                               <td ><?php echo $carreras[$i];?></td>
							<?php } }  ?>


								<?php  
						    for ($x = 0; $x< count($id_usu);$x++ ){

						    if ($alumno_id_usuario == $id_usu[$x] ) { ?>

						    <td ><?php echo $usuario3[$x];?></td>
					         <?php } }  ?>

							
						</tr>
						<?php  	} ?>
						<tr>
							<td colspan='6'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Mostrando $inicios al $finales de $numrows registros";
									echo paginate( $page, $total_pages, $adjacents);
								?>
							</td>
						</tr>
				</tbody>			
			</table>
		</div>	

	<?php	
		
}
}
?>          