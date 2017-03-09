
<div class="jumbotron">
<div class="cent">
	<div class="navbar navbar-default">
		<ul class="nav navbar-nav"><!-- navbar-nav los organiza horizontalmente-->
                        <li class="ol"><a href="#" id="entrada">Entrada</a></li>
                        <li class="ol"><a href="#" id="salida">Salida</a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Opciones <span class="caret"></span>
				<ul class="dropdown-menu">
					<?php 
					if(isset($_GET["crear"])){
						?>
						<li><a href="#">Crear Producto</a></li>
						<li><a href="#">Crear Librería</a></li>
						<li><a href="#">Crear Proveedor</a></li>
						<?php
					}

					if(isset($_GET["editar"])){
						?>
						<li><a href="#">Editar Producto</a></li>
						<li><a href="#">Editar Librería</a></li>
						<li><a href="#">Editar Proveedor</a></li>
						<?php	
					}	

					if(isset($_GET["eliminar"])){
						?>
						<li><a href="#">Eliminar Producto</a></li>
						<li><a href="#">Eliminar Librería</a></li>
						<li><a href="#">Eliminar Proveedor</a></li>
						<?php	
					}
					?>

					<li><a href="#">Consultar Inventario</a></li>
				</ul>
			</li>
		</ul>
	</div><!--navbar-->

<div id="contenido">
</div>


</div><!--cent-->
</div><!--jumbotron-->

