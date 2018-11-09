<?php

error_reporting(0);	
	/* Connect To Database*/
	require_once ("../conexion_reportes.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="tb_catedratico";
	$campos="*";
	$sWhere=" tb_catedratico.NOM_CATEDRATICO LIKE '%".$query."%' OR tb_catedratico.APE_CATEDRATICO LIKE '%".$query."%' OR tb_catedratico.ID_CATEDRATICO LIKE '%".$query."%' ";
	$sWhere.=" order by tb_catedratico.ID_CATEDRATICO";
	
	

	
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


	$query3 = mysqli_query ($con,"SELECT tb_usuario.ID_USUARIO, tb_usuario.NOM_USUARIO, tb_usuario.PASS_USUARIO FROM tb_catedratico INNER JOIN tb_usuario on tb_catedratico.ID_USUARIO=tb_usuario.ID_USUARIO order by tb_catedratico.ID_CATEDRATICO");



// iniciamos un array donde vamos a meter lo datos de la tabla TB_USUARIO
	$id_usu = array ();
	$usuario3 = array ();
	$password = array ();
	$finales3=0;
	


	// CONSULTAMOS LOS DATOS DE LA TABLA TB_USUARIO Y LOS GUARDAOS EN EL ARREGLO
	while($row2 = mysqli_fetch_array($query3)){
		$id_usu [$finales3] =   $row2['ID_USUARIO'];
		$usuario3 [$finales3] = $row2['NOM_USUARIO'];
		$password [$finales3] = $row2['PASS_USUARIO'];
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
						<th><a> Usuario </a> </th>
						<th><a> Contraseña </a> </th>
						<th></th>
					</tr>
				</thead>
				<tbody>	

						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							
							$cat_id=$row['ID_CATEDRATICO'];
							$cat_name=$row['NOM_CATEDRATICO'];
							$cat_ape=$row['APE_CATEDRATICO'];
							$cat_telefono=$row['TEL_CATEDRATICO'];
							$cat_email=$row['EMAIL_CATEDRATICO'];
							$cat_direccion=$row['DIR_CATEDRATICO'];
							$cat_id_usuario=$row['ID_USUARIO'];
							$finales++;
                           
						?>	

						
						<tr class="<?php echo $text_class;?>">
					     	
                          <td class='text-center' ><?php echo $cat_id;?></td>
							<td ><?php echo $cat_name;?></td>
							<td ><?php echo $cat_ape;?></td>
							<td ><?php echo $cat_telefono;?></td>
							<td ><?php echo $cat_email;?></td>
							<td ><?php echo $cat_direccion;?></td>
							
						

								<?php  
						    for ($x = 0; $x< count($id_usu);$x++ ){

						    if ($cat_id_usuario == $id_usu[$x] ) { ?>

						    <td ><?php echo $usuario3[$x];?></td>
							<td ><?php echo $password[$x];?></td>
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