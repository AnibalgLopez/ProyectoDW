<?php
	
	/* Connect To Database*/
	require_once ("../conexion.php");
	session_start();
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
	$query = mysqli_real_escape_string($mysqli,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="tb_notas";
	$campos="*";	
	
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
	
	//realizamos el match el id usuario con la tabla alumnos para encontrar el id alumno
	$id_match = $_SESSION['usuario']['ID_USUARIO'];

	$query_match = mysqli_query($mysqli,"SELECT tb_alumnos.ID_ALUMNO FROM tb_usuario
	INNER JOIN tb_alumnos ON tb_usuario.ID_USUARIO=tb_alumnos.ID_USUARIO
	WHERE tb_usuario.ID_USUARIO = $id_match");

	$resultado_query = mysqli_fetch_array($query_match);
	$id_alumno = $resultado_query['ID_ALUMNO'];

	//vamos a buscar las notas del alumno con el id alumno obtenido anteriormente

	$query_notas = mysqli_query($mysqli,"SELECT tb_notas.ID_CURSO, tb_notas.PP_NOTA, tb_notas.SP_NOTA, tb_notas.ACT_NOTA, tb_notas.EF_NOTA,
	SUM(PP_NOTA + SP_NOTA + ACT_NOTA + EF_NOTA) AS TOTAL FROM tb_alumnos
	INNER JOIN tb_notas ON tb_alumnos.ID_ALUMNO=tb_notas.ID_ALUMNO
	WHERE tb_alumnos.ID_ALUMNO = $id_alumno");

	$indice = 0;
	$nom_curso = array();

	while($row = mysqli_fetch_array($query_notas)){

		$id_curso = $row['ID_CURSO'];
		$query_curso = mysqli_query($mysqli, "SELECT NOM_CURSO FROM TB_CURSO WHERE ID_CURSO = $id_curso");
		$resultado_query = mysqli_fetch_array($query_curso);

		$nom_curso[$indice] = $resultado_query['NOM_CURSO'];
		$indice++;
	}
		
	
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th>
						<th class='text-center'>CURSO</th>
                        <th class='text-center'>PRIMER PARCIAL</th>
						<th class='text-center'>SEGUNDO PARCIAL </th>
						<th class='text-center'>ACTIVIDADES</th>
						<th class='text-center'>EXAMEN FINAL</th>
						<th class='text-center'>TOTAL</th>
						</th>
					</tr>
				</thead>
				<tbody>	
						<?php
						
						$query_notas = mysqli_query($mysqli,"SELECT tb_notas.ID_CURSO, tb_notas.PP_NOTA, tb_notas.SP_NOTA, tb_notas.ACT_NOTA, tb_notas.EF_NOTA,
						SUM(PP_NOTA + SP_NOTA + ACT_NOTA + EF_NOTA) AS TOTAL FROM tb_alumnos
						INNER JOIN tb_notas ON tb_alumnos.ID_ALUMNO=tb_notas.ID_ALUMNO
						WHERE tb_alumnos.ID_ALUMNO = $id_alumno");

						$indice = 0; 
						$finales = 0;
						while($row = mysqli_fetch_array($query_notas)){	
                            $parcial1=$row['PP_NOTA'];
							$parcial2=$row['SP_NOTA'];
							$actividades=$row['ACT_NOTA'];
							$examen=$row['EF_NOTA'];
							$total=$row['TOTAL'];		
							$finales++;
						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-center' >
									<td class='text-center'><?php echo $nom_curso[$indice];?></td>
									<td class='text-center'><?php echo $parcial1;?></td>
									<td class='text-center'><?php echo $parcial2;?></td>
									<td class='text-center'><?php echo $actividades;?></td>
									<td class='text-center'><?php echo $examen;?></td>
									<td class='text-center'><?php echo $total;?></td>
							</td>
						</tr>
						<?php }?>
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