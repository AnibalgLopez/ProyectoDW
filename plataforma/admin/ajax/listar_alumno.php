<?php
	
	/* Connect To Database*/
	require_once ("../conexion.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($mysqli,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="tb_alumnos";
	$campos="*";
    $sWhere="ID_ALUMNO LIKE '%".$query."%'
	OR NOM_ALUMNO LIKE '%".$query."%'
	OR ID_CARRERA LIKE '%".$query."%'
	";
    $sWhere.=" order by tb_alumnos.ID_ALUMNO";
	
	
	include 'pagination_alumno.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 1; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($mysqli,"SELECT count(*) AS numrows FROM $tables where $sWhere " );
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($mysqli);}
	$total_pages = ceil($numrows/$per_page);
	//main query to fetch the data
	$query = mysqli_query($mysqli,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
    //loop through fetched data
    
	


		
	
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center'>ID</th>
						<th class='text-center'>Nombre</th>
                        <th class='text-center'>Apellido</th>
						<th class='text-center'>Telefono </th>
						<th class='text-center'>Email</th>
						<th class='text-right'>Dirección</th>
                        <th class='text-center'>ID Carrera</th>
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$product_id=$row['ID_ALUMNO'];
							$prod_code=$row['NOM_ALUMNO'];
                            $prod_name=$row['APE_ALUMNO'];
                            $lastname=$row['TEL_ALUMNO'];
							$prod_ctry=$row['EMAIL_ALUMNO'];
							$prod_qty=$row['DIR_ALUMNO'];
                            $price=$row['ID_CARRERA'];
							$finales++;
						?>	
						<tr class="<?php;?>">
							<td class='text-center'><?php echo $product_id;?></td>
							<td class='text-center'><?php echo $prod_code;?></td>
                            <td class='text-center'><?php echo $prod_name;?></td>
							<td class='text-center'><?php echo $lastname;?></td>
							<td class='text-center'><?php echo $prod_ctry;?></td>
							<td class='text-right'><?php echo  $prod_qty;?></td>
							<td class='text-center'><?php echo  $price;?></td>
							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-code='<?php echo $prod_code;?>' data-name="<?php echo $prod_name?>" data-lastname="<?php echo $lastname?>" data-category="<?php echo $prod_ctry?>" data-stock="<?php echo $prod_qty?>" data-price="<?php echo $price;?>" data-id="<?php echo $product_id; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $product_id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>
						</tr>
						<?php }?>
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