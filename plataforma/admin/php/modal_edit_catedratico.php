<div id="editProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_product" id="edit_product">
					<div class="modal-header">						
						<h4 class="modal-title">Editar catedrático</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" name="edit_code"  id="edit_code" class="form-control" required>
							<input type="hidden" name="edit_id" id="edit_id" >
						</div>
						<div class="form-group">
							<label>Apellido</label>
							<input type="text" name="edit_name" id="edit_name" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>Teléfono</label>
							<input type="text" name="edit_lastname" id="edit_lastname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Correo</label>
							<input type="text" name="edit_category" id="edit_category" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Dirección</label>
							<input type="text" name="edit_stock" id="edit_stock" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ID usuario</label>
							<input type="text" name="edit_price" id="edit_price" class="form-control" required>
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