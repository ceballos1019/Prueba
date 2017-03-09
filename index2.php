<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>LIBRERÍA</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Inventario libreria">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--Style-->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Compiled and minified CSS -->

	<!--<link rel="stylesheet" href="css/bootstrap-theme.min.css">-->
	<link href="css/jquery-ui.css" rel="stylesheet">
	<link href="css/icomoon.css" rel="stylesheet">
	<link href="css/estilo.css" rel="stylesheet">


	<!--<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>		-->
	<script src="js/vendor/jquery-1.11.2.min.js"></script>

	<!--Scripts-->
	<script src="js/vendor/bootstrap.min.js"></script>
	<!-- Compiled and minified JavaScript -->

</head>
<body>
	<div class="container">
		<div class="jumbotron jumbotron-personalizado" id="my_jumbotron">
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<img class="img-responsive" id="logo_libreria" src="images/logo_libreria.png" alt="Logotipo libreria" >
				</div>
				<div class="col-md-4 col-xs-4 titulo-personalizado">
					<h1>Librería</h1>
				</div>
			</div>
		</div>
		<?php
		if(isset($_SESSION['user_session'])){
			if($_SESSION['user_type']=='1'){
				//include("includes/usuario.php");
				include("includes/administrador.php");
			}
			else{
				include("includes/test.php");
			}
		}
		else{
			include("login.php");
		}
		?>
	</div>

	<!--<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>-->
	<script src="js/funciones.js"></script>
</body>
</html>
