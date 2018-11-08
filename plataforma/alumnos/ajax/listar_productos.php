<?php
	
	/* Connect To Database*/
	require_once ("../conexion.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($mysqli,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="tb_notas";
	$campos="*";
    $sWhere="vecindad LIKE '%".$query."%'
	OR lugar LIKE '%".$query."%'
	OR last_name LIKE '%".$query."%'
	OR prod_name LIKE '%".$query."%'
	OR prod_ctry LIKE '%".$query."%'
	OR prod_qty LIKE '%".$query."%'
	OR prod_code LIKE '%".$query."%'
	OR price LIKE '%".$query."%'
	OR estado LIKE '%".$query."%'
	OR fecha LIKE '%".$query."%'
	";
    $sWhere.=" order by tblprod.prod_name";
	
	
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 1; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($mysqli,"SELECT count(*) AS numrows FROM $tables " );
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($mysqli);}
	$total_pages = ceil($numrows/$per_page);
	//main query to fetch the data
	$query = mysqli_query($mysqli,"SELECT $campos FROM  $tables LIMIT $offset,$per_page");
    //loop through fetched data
    
	


		
	
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center'>SEMESTRE</th>
						<th class='text-center'>FECHA</th>
                        <th class='text-center'>PRIMER PARCIAL</th>
						<th class='text-center'>SEGUNDO PARCIAL </th>
						<th class='text-center'>ACTIVIDADES</th>
						<th class='text-right'>EXAMEN FINAL</th>
                        <th class='text-center'>CURSO</th>
                        <th class='text-center'>ALUMNO</th>
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$product_id=$row['ID_NOTA'];
							$prod_code=$row['SEM_NOTA'];
                            $prod_name=$row['FECHA_NOTA'];
                            $lastname=$row['PP_NOTA'];
							$prod_ctry=$row['SP_NOTA'];
							$prod_qty=$row['ACT_NOTA'];
                            $price=$row['EF_NOTA'];		
                            $vecindad=$row['ID_CURSO'];
                            $lugar=$row['ID_ALUMNO'];
							$finales++;
						?>	
						<tr class="<?php;?>">
							<td class='text-center'><?php echo $prod_code;?></td>
							<td class='text-center'><?php echo $prod_name;?></td>
                            <td class='text-center'><?php echo $lastname;?></td>
							<td class='text-center'><?php echo $prod_ctry;?></td>
							<td class='text-center'><?php echo $prod_qty;?></td>
							<td class='text-right'><?php echo $price;?></td>
                            <td class='text-center'><?php echo $vecindad;?></td>
                            <td class='text-center'><?php echo $lugar;?></td>
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