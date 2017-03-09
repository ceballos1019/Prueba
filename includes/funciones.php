<?php
require_once("User.php");
if(isset($_POST['submit_login'])){
	//checkLogin();
	require_once '../logica/UserDAO.php';
	require_once '../model/user.php';
	$userDao = new UserDAO();
	/*foreach ($userDao->listUsers() as $t){
		var_dump($t);
	}*/
	$userDao->getUser(1036954574);
}
else if(isset($_GET["log_out"])){
	$_SESSION = array();
	echo '<script> window.location = "../index.php";</script>';

} else{
	echo "Could not enter to this site!";
}

function checkLogin(){
	//Load database config
	include("config.php");

	try{
		//Create connnection
		$conn = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE,DB_USERNAME,DB_PASSWORD);
		//Set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		/*Get the inputs*/
		$username_input = $_POST['usuario'];
		$password_input = $_POST['password'];

		/*Variables for store the login information*/
		$username = "";
		$password = "";

		/*Select the information entered*/
		foreach ($username_input as $user) {
			if($user!=""){
				$username = $user;
			}
		}
		foreach ($password_input as $pass) {
			if($pass!=""){
				$password = $pass;
			}
		}

		//Create user and execute a query
		$user = new User($conn);
		if($user->checkLogin($username,$password)){
			header("Location: ../index.php");
		}else{
			$_SESSION['error']="La informacion ingresada es incorrecta";
			header("Location: ../index.php");
		}
	}catch(PDOException $e){
		echo "Error: " + $e->getMessage();
	}finally{
		//Close the connection
		$conn=null;
	}
}


function verificar(){
	$servername = "localhost";
	$dbname = "inventario_libreria";
	$username = "root";
	$password = "";

	$us = $_POST["usuario"];
	$pass= $_POST["password"];
	//print $_POST["usuario"];
	//var_dump($_POST);
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		$result_existe = $conn->query("SELECT * FROM usuario WHERE username = '$us' AND password='$pass'");

		foreach($result_existe as $v) {
			session_start();
			$_SESSION['sesion']= "YES";

			if($v["id"]==1){
				$_SESSION["tipo_usuario"] = "ADMIN";
				?>
				<script>
					//alert("Administrador");
					window.location = "../index.php";
				</script>
				<?php

			}
			else {
				$_SESSION["tipo_usuario"] = "USUARIO";
				//carga permisos
				$permisos="";
				if($v["editar"]==1){
					if($permisos =="") $permisos .= "?editar";
					else $permisos .= "&editar";
				}
				if($v["eliminar"]==1){
					if($permisos =="") $permisos .= "?eliminar";
					else $permisos .= "&eliminar";
				}
				if($v["crear"]==1){
					if($permisos =="") $permisos .= "?crear";
					else $permisos .= "&crear";
				}
				?>
				<script>
					window.location = "../index.php"+"<?php echo $permisos; ?>";
				</script>
				<?php


			}//else

		}//end foreach
		?>
		<script>
			alert("El usuario no existe");
			window.location = "../index.php";
		</script>
		<?php

	}
	catch(PDOException $e)
	{
		print_r($sql . "<br>" . $e->getMessage());
	}

	$conn = null;
}
?>
