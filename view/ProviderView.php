<?php
require_once dirname(__FILE__)."/../controller/ProviderController.php";
?>
<h3><i class="fa fa-list-alt"></i> Control de Proveedores</h3>
<div class="table-responsive">
	<table class="custom-table">
		<thead>
			<tr>
				<th>Código</th>
				<th>Nombre</th>
				<th>Dirección</th>
				<th>Teléfono</th>
				<th>Fecha Registro</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$providerC = new ProviderController();
			foreach ($providerC->getProviders() as $provider): ?>
			<tr>
				<td><?php echo $provider->__GET('code'); ?></td>
				<td><?php echo $provider->__GET('name'); ?></td>
				<td><?php echo $provider->__GET('address'); ?></td>
				<td><?php echo $provider->__GET('phoneNumber'); ?></td>
				<td><?php echo $provider->__GET('registerDate'); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>
<br><br>
<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Guardar cambios</button>
<br><br><br>


<hr>

<br>
<a class="float" id="add-product" data-toggle="modal" data-target="#add-product-modal" href="#">
	<i class="glyphicon glyphicon-plus"></i>
</a>
<!-- Modal -->
<div class="modal fade" id="add-product-modal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button class="close" data-dismiss="modal" type="button">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h3 class="modal-title" id="myModalLabel">Creación Nuevo Usuario</h3>
			</div>

			<!-- Modal Body -->
			<div class="modal-body">
				<form class="form" id="myForm" role="form" method="post">
					<div class="form-group card">
						<fieldset>
							<legend>Datos personales</legend>
							<label class="sr-only" for="cedula" >Cédula</label>
							<input class="form-control large-input" id="cedula" name="cedula" type="number" placeholder="Ingrese la cédula" required>
							<label class="sr-only" for="name">Nombre (s)</label>
							<input class="form-control" id="name" name="name" type="text" pattern="([A-zÀ-ž][A-zÀ-ž\s]*){2,}"
							placeholder="Ingrese el nombre" title="El nombre no debe contener números ni caracteres especiales" required>
							<label class="sr-only" for="last-name">Apellido (s)</label>
							<input class="form-control" id="last-name" name="last-name" type="text" pattern="([A-zÀ-ž][A-zÀ-ž\s]*){2,}"
							placeholder="Ingrese los apellidos" title="El apellido no debe contener números ni caracteres especiales" required>
						</fieldset>
					</div>
					<div class="form-group card">
						<fieldset>
							<legend>Datos de la cuenta</legend>
							<label class="sr-only" for="username">Usuario</label>
							<input class="form-control large-input"  id="username" name="username" type="text" pattern="([^\s]){3,}"
							placeholder="Nombre de usuario" title="Usa 3 o más caracteres (No espacios)" required>
							<label class="sr-only" for="password">Contraseña</label>
							<input class="form-control" id="password-user" name="password" type="password" placeholder="Contraseña"
							minlength="6" maxlength="30" required>
							<label class="sr-only" for="password-confirm">Confirmar contraseña</label>
							<input class="form-control" id="password-confirm" name="password-confirm" type="password" placeholder="Confirmar contraseña"
							oninput="checkConfirmPassword(this)" required>
						</fieldset>
					</div>
					<div class="custom-input custom-radio card">
						<fieldset>
							<legend>Tipo de cuenta</legend>
							<ul>
								<li>
									<input id="admin-option"  name="account-type" type="radio" value="admin" required>
									<label for="admin-option">Administrador</label>
									<div class="checked"></div>
								</li>
								<li>
									<input id="normal-option" name="account-type" type="radio" value="normal" checked="true">
									<label for="normal-option">Normal</label>
									<div class="checked"></div>
								</li>
							</ul>
						</fieldset>
					</div>
					<div class="custom-input custom-checkbox card">
						<fieldset>
							<legend>Permisos</legend>
							<ul>
								<li>
									<input id="create-option" name="permissions[]" type="checkbox" value="1" >
									<label for="create-option">Crear</label>
									<div class="checked"></div>
								</li>
								<li>
									<input id="edit-option" name="permissions[]" type="checkbox" value="2" >
									<label for="edit-option">Editar</label>
									<div class="checked"></div>
								</li>
								<li>
									<input id="delete-option" name="permissions[]" type="checkbox" value="3">
									<label for="delete-option">Eliminar</label>
									<div class="checked"></div>
								</li>
							</ul>
						</fieldset>
					</div>
				</form>
			</div>

			<!-- Modal Footer -->
			<div class="modal-footer">
				<div class="btn-group btn-group-justified" role="group" aria-label="group button">
					<div class="btn-group" role="group">
						<button type="button" class="btn btn-default" data-dismiss="modal" role="button">
							Cancelar
						</button>
					</div>
					<div class="btn-group" role="group">
						<button class="btn btn-primary" id="btn-create" type="submit" role="button" form="myForm">
							Crear
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
