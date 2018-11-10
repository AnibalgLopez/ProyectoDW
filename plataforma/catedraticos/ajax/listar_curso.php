<?php
	
	/* Connect To Database*/
	require_once ("../conexion.php");
	session_start();

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($mysqli,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="tb_curso";
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
	
	$id_match = $_SESSION['usuario']['ID_USUARIO'];

	$query_match = mysqli_query($mysqli,"SELECT tb_catedratico.ID_CATEDRATICO FROM tb_usuario
	INNER JOIN tb_catedratico ON tb_usuario.ID_USUARIO=tb_catedratico.ID_USUARIO
	WHERE tb_usuario.ID_USUARIO = $id_match");

	$resultado_query = mysqli_fetch_array($query_match);
	$id_catedratico = $resultado_query['ID_CATEDRATICO'];

	$GLOBALS['query_curso'] = mysqli_query($mysqli,"SELECT tb_curso.ID_CURSO, tb_curso.NOM_CURSO, tb_curso.ID_CARRERA
	FROM tb_asig_catedratico INNER JOIN tb_curso ON tb_asig_catedratico.ID_CURSO=tb_curso.ID_CURSO
	WHERE tb_asig_catedratico.ID_CATEDRATICO = $id_catedratico");

	$indice = 0;
	$nom_carrera = array();

	while($row = mysqli_fetch_array($query_curso)){

		$id_carrera = $row['ID_CARRERA'];
		$query_carrera = mysqli_query($mysqli, "SELECT NOM_CARRERA FROM TB_CARRERA WHERE ID_CARRERA = $id_carrera");
		$resultado_query = mysqli_fetch_array($query_carrera);

		$nom_carrera[$indice] = $resultado_query['NOM_CARRERA'];
		$indice++;
	}
    
	
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
					<th class='text-center'>CÓDIGO CURSO</th>
						<th class='text-center'>NOMBRE</th>
						<th class='text-center'>CARRERA</th>
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php

						$GLOBALS['query_curso'] = mysqli_query($mysqli,"SELECT tb_curso.ID_CURSO, tb_curso.NOM_CURSO, tb_curso.ID_CARRERA
						FROM tb_asig_catedratico INNER JOIN tb_curso ON tb_asig_catedratico.ID_CURSO=tb_curso.ID_CURSO
						WHERE tb_asig_catedratico.ID_CATEDRATICO = $id_catedratico");

						$indice=0; 
						$finales=0;
						while($row = mysqli_fetch_array($query_curso)){	
							$codigo=$row['ID_CURSO'];
							$nombre=$row['NOM_CURSO'];
                            $carrera=$nom_carrera[$indice];
							$finales++;
							$indice++;
						?>	
						<tr class="<?php;?>">
							<td class='text-center'><?php echo $codigo;?></td>
							<td class='text-center'><?php echo $nombre;?></td>
							<td class='text-center'><?php echo $carrera;?></td>
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