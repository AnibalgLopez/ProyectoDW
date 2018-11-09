<div id="editProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_product" id="edit_product">
					<div class="modal-header">						
						<h4 class="modal-title">Editar Nota</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>SEMESTRE</label>
							<input type="text" name="edit_code"  id="edit_code" class="form-control" required>
							<input type="hidden" name="edit_id" id="edit_id" >
						</div>
						<div class="form-group">
							<label>FECHA</label>
							<input type="date" name="edit_name" id="edit_name" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>HORARIO</label>
							<input type="text" name="edit_lastname" id="edit_lastname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>CATEDRATICO</label>
							<input type="text" name="edit_category" id="edit_category" class="form-control" required>
						</div>
						<div class="form-group">
							<label>CURSO</label>
							<input type="text" name="edit_stock" id="edit_stock" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>