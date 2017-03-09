<?php
require_once dirname(__FILE__)."/../controller/UserController.php";
?>
<h3><span class="icon-users"></span> Control de Usuarios</h3>
<div class="table-responsive">
	<table class="custom-table">
		<thead>
			<tr>
				<th rowspan="2">Cédula</th>
				<th rowspan="2">Nombres</th>
				<th rowspan="2">Apellidos</th>
				<th rowspan="2">Usuario</th>
				<th colspan="3">Permisos</th>
			</tr>
			<tr>
				<th>Crear</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$uc = new UserController();
			foreach ($uc->listUsers() as $user): ?>
			<tr>
				<td><?php echo $user->__GET('idCard'); ?></td>
				<td><?php echo $user->__GET('name'); ?></td>
				<td><?php echo $user->__GET('lastName'); ?></td>
				<td><?php echo $user->__GET('username'); ?></td>
				<?php
				$userType = $user->__GET('userType');
				if ($userType == 1){
					?>
					<td>
						<input type="checkbox" data-toggle="toggle" data-size="small" data-onstyle="info" checked disabled
						data-on="<i class='fa fa-check'></i>" data-off="<i class='fa fa-ban'></i>">
					</td>
					<td>
						<input type="checkbox" data-toggle="toggle" data-size="small" data-onstyle="info" checked disabled
						data-on="<i class='fa fa-check'></i>" data-off="<i class='fa fa-ban'></i>">
					</td>
					<td>
						<input type="checkbox" data-toggle="toggle" data-size="small" data-onstyle="info" checked disabled
						data-on="<i class='fa fa-check'></i>" data-off="<i class='fa fa-ban'></i>">
					</td>
					<?php
				} else {
					$permissions = $uc->getPermissions($user->__GET('code'));
					for($i = 1; $i <= MAX_PERMISSIONS; $i++){
						if (in_array($i,$permissions)){?>
							<td>
								<input type="checkbox" data-toggle="toggle" data-size="small" data-onstyle="info" checked
								data-on="<i class='fa fa-check'></i> " data-off="<i class='fa fa-ban'></i> ">
							</td>
							<?php
						} else { ?>
							<td>
								<input type="checkbox" data-toggle="toggle" data-size="small" data-onstyle="info"
								data-on="<i class='fa fa-check'></i> " data-off="<i class='fa fa-ban'></i> ">
							</td>
							<?php
						}
					}
				}?>
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
<a class="float" id="add-user" data-toggle="modal" data-target="#myModal" href="#">
	<i class="glyphicon glyphicon-plus"></i>
</a>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
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
