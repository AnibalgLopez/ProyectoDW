<?php 
session_start();
if (!isset($_SESSION["usuario"])) {
    header('Location: ../../login.php');
}
else if ($_SESSION['usuario']['TIPO_USUARIO']!=0) {
    header('Location: ../error.html');
}
 ?>

<?php include 'php/encabezado.php';?>
<?php include 'php/panel-izquierdo.php';?>
<?php include 'php/panel-superior.php';?>

<body>    

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><b>Cursos</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar curso</span></a>
					</div>
                </div>
            </div>
			<div class='col-sm-4 pull-right'>
				<div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" placeholder="Buscar"  id="q" onkeyup="principal(1);" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button" onclick="principal(1);">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                </div>
			</div>
			<div class='clearfix'></div>
			<hr>
			<div id="loader"></div><!-- Carga de datos ajax aqui -->
			<div id="resultados"></div><!-- Carga de datos ajax aqui -->
			<div class='outer_div'></div><!-- Carga de datos ajax aqui -->
            
			
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<?php include "php/modal_add_curso.php";?>
	<!-- Edit Modal HTML -->
	<?php include "php/modal_edit_curso.php";?>
	<!-- Delete Modal HTML -->
	<?php include "php/modal_delete_curso.php";?>

	<?php include 'php/pie-pagina.php';?>
	
	<script src="js/script_curso.js"></script>
</body>

</html>