<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/bootstrap-select.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="js/funciones.js"></script>
<style>
	.ol{
		padding-right: 10px;
		padding-left: 10px;
	}
	
	.cent{
		text-align: center;
	}
</style>
</head>
<body>

<div class="container">

<div class="jumbotron">
	<h1 style="text-align:center;"> Librería</h1>
</div><!--jumbotron-->



<div class="jumbotron">
<div class="cent">
	<div class="navbar navbar-default">
		<ul class="nav navbar-nav"><!-- navbar-nav los organiza horizontalmente-->
			<li class="dropdown ol">
				<a class="dropdown-toggle" data-toggle="dropdown">Parametrizar <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li id="bod"> Bodegassss</li>
					<li id="prov"> Proveedores</li>
					<li id="lib"> Librerías</li>
				</ul>
			</li>
			<li class="ol"><a href="#">Control de Usuarios</a></li>
			<li class="ol"><a href="#">Entrada</a></li>
			<li class="ol"><a href="#">Salida</a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Opciones <span class="caret"></span>
				<ul class="dropdown-menu">
					<li><a href="#">Crear Producto</a></li>
					<li><a href="#">Editar Producto</a></li>
					<li><a href="#">Eliminar Producto</a></li>
					<li><a href="#">Crear Librería</a></li>
					<li><a href="#">Crear Proveedor</a></li>
					<li><a href="#">Consultar Inventario</a></li>			
				</ul>
			</li>
		</ul>
	</div><!--navbar-->

<div id="contenido">
	

</div>


</div><!--cent-->
</div><!--jumbotron-->

</div><!--container-->


</body>
</html>