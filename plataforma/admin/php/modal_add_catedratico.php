<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_product" id="add_product">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Catedratico</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>Apellido</label>
							<input type="text" name="apellido" id="apellido" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Telefono</label>
							<input type="text" name="telefono" id="telefono" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Correo</label>
							<input type="text" name="correo" id="correo" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Dirección</label>
							<input type="text" name="direccion" id="direccion" class="form-control" required>
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




	<div id="addAsignaModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_product" id="add_product">
					<div class="modal-header">						
						<h4 class="modal-title">Asignar Catedratico</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Id Asignacion Curso/label>
							<input type="text" name="code"  id="code" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Semestre </label>
							<input type="text" name="name" id="name" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>Fecha Asignacion</label>
							<input type="date" name="lastname" id="lastname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Horario Asignacion</label>
							<input type="time" name="category" id="category" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Id catedratico</label>
							<input type="text" name="stock" id="stock" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Id Curso</label>
							<input type="text" name="price" id="price" class="form-control" required>
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