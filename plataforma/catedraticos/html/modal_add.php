<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_product" id="add_product">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Nota</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>SEMESTRE</label>
							<input type="text" name="code"  id="code" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>FECHA</label>
							<input type="date" name="name" id="name" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>PRIMER PARCIAL</label>
							<input type="text" name="lastname" id="lastname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>SEGUNDO PARCIAL</label>
							<input type="text" name="category" id="category" class="form-control" required>
						</div>
						<div class="form-group">
							<label>ACTIVIDADES</label>
							<input type="text" name="stock" id="stock" class="form-control" required>
						</div>
						<div class="form-group">
							<label>EXAMEN FINAL</label>
							<input type="text" name="price" id="price" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>CURSO</label>
							<input type="text" name="vecindad" id="vecindad" class="form-control" required>
						</div>		
                        <div class="form-group">
							<label>ALUMNO</label>
							<input type="text" name="lugar" id="lugar" class="form-control" required>
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