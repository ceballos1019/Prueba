<section class="login-panel">
	<form action="index.php" method="post" role="form">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 hidden-xs">
				<label class="control-label" for="usuario">Usuario</label>
				<input class="form-control" id="usuario" name="usuario[]" type="text"><br>
			</div>
			<div class="col-xs hidden-sm hidden-md hidden-lg">
				<input class="form-control" id="usuario-xs" name="usuario[]" type="text" placeholder="Usuario"><br>
			</div>
			<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 hidden-xs">
				<label class="control-label" for="usuario">Contraseña</label>
				<input class="form-control" id="password" name="password[]" type="password"><br>
			</div>		
			<div class="col-xs hidden-sm hidden-md hidden-lg">
				<input class="form-control" id="password-xs" name="password[]" type="password" placeholder="Contraseña"><br>
			</div>
			<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4">
				<button class="btn btn-primary" id="btn-login" name="submit_login" type="submit">Ingresar</button>
			</div>
		</div>
		<?php
		if(isset($_SESSION['error']))
		{
			?>
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs">
					<div class="alert alert-danger alert-personalizado">
						<i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $_SESSION['error'];?>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</form>
</section>
