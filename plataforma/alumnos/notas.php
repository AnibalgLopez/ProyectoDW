<?php include 'php/encabezado.php';?>
<?php include 'php/panel-izquierdo.php';?>
<?php include 'php/panel-superior.php';?>
<body>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><b>Notas</b></h2>
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

	<?php include 'php/pie-pagina.php';?>
	
	<script src="js/script.js"></script>

	
</body>
</html>