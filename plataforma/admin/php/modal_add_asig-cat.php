<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_product" id="add_product">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Asignación</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>SEMESTRE</label>
							<input type="number" name="semestre"  id="semestre" class="form-control" required>							
						</div>
						<div class="form-group">
							<label>FECHA</label>
							<input type="date" name="fecha" id="fecha" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>HORARIO</label>
							<input type="text" name="parcial1" id="parcial1" class="form-control" required>
						</div>
						<div class="form-group">
							<label>CATEDRATICO</label>
							<input type="number" name="parcial2" id="parcial2" class="form-control" required>
						</div>
						<div class="form-group">
							<label>CURSO</label>
							<input type="number" name="actividades" id="actividades" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
</div>