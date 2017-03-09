<?php
include("config.php");

/*Get the inputs from the form*/
$cedula = isset($_POST['cedula']) ? $_POST['cedula']:0;
$name = isset($_POST['name']) ? $_POST['name']:'';
$lastName = isset($_POST['last-name']) ? $_POST['last-name']:'';
$username = isset($_POST['username']) ? $_POST['username']:'';
$password = isset($_POST['password']) ? $_POST['password']:'';
$confirmPassword = isset($_POST['password-confirm']) ? $_POST['password-confirm']:'';
$accountType = isset($_POST['account-type']) ? $_POST['account-type']:'';
$permissions = isset($_POST['permissions']) ? $_POST['permissions']:[];

/* Auxiliar variables*/
$namePattern = '/[a-zA-Z][a-zA-Z\s]/';  //Pattern to validate the input
$usernamePattern = '/[\s]/'; //Pattern to validate the input
$hashedPassword = "";
$userType = ($accountType === 'admin') ? 1 : 2;
$errors = array();

/*Validations on input data*/
if(!is_numeric($cedula)){
  //$errors[] = "La cédula solo debe contener caracteres numéricos";
  echo "La cédula solo debe contener caracteres numéricos";
}else if(strlen($cedula) > 15){
  echo "La cédula no debe contener más de 15 caracteres numéricos";
}

if(!preg_match($namePattern,$name)){
  //$errors[] = "El nombre no debe contener números ni caracteres especiales";
  echo "El nombre no debe contener números ni caracteres especiales";
}

if(!preg_match($namePattern,$lastName)){
  //$errors[] = "El apellido no debe contener números ni caracteres especiales";
  echo "El apellido no debe contener números ni caracteres especiales";
}

if(preg_match($usernamePattern,$username)){
  //$errors[] = "El nombre de usuario no debe contener espacios";
  echo "El nombre de usuario no debe contener espacios";
}

if($password !== $confirmPassword){
  //$errors[] = "Las contraseñas deben coincidir";
  echo "Las contraseñas deben coincidir";
}else{
  $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
  //echo $hashedPassword;
}

try{

  //Create connnection
  $conn = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE,DB_USERNAME,DB_PASSWORD);

  //Set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Begin the transaction
  $conn->beginTransaction();

  /*Check if the user already exists*/
  $checkQuery = $conn->prepare("SELECT username FROM usuario WHERE username = :username LIMIT 1");
  $checkQuery->bindParam(':username',$username);
  $checkQuery->execute();
  $result = $checkQuery->fetch(PDO::FETCH_ASSOC);
  if($checkQuery->rowCount() > 0){
    return; //Username already exists
  }

  /*Add user to database*/
  $insertQuery = $conn->prepare("INSERT INTO usuario(cedula,nombres,apellidos,username,password,tipo_usuario)
                                  VALUES(:cedula,:nombres,:apellidos,:username,:password,:tipo_usuario)");
  $insertQuery->bindParam(':cedula',$cedula);
  $insertQuery->bindParam(':nombres',$name);
  $insertQuery->bindParam(':apellidos',$lastName);
  $insertQuery->bindParam(':username',$username);
  $insertQuery->bindParam(':password',$hashedPassword);
  $insertQuery->bindParam(':tipo_usuario',$userType);

  //Execute the query
  $insertQuery->execute();

  /*Get the user code*/
  $codeQuery = $conn->prepare("SELECT codigo FROM usuario WHERE username = :username LIMIT 1");
  $codeQuery->bindParam(':username',$username);
  $codeQuery->execute();
  $currentUser = $codeQuery->fetch(PDO::FETCH_ASSOC);

  /*Add user's permission to database*/
  $permissionsQuery = $conn->prepare("INSERT INTO permisoxusuario(permiso_codigo,usuario_codigo) VALUES(:permiso,:usuario)");
  $permissionsQuery->bindParam(':usuario',$currentUser['codigo']);
  foreach ($permissions as $permission) {
    $permissionsQuery->bindParam(':permiso',$permission);
    $permissionsQuery->execute();
  }

  //Commit the transaction
  $conn->commit();

}catch(PDOException $e){
  //Rollback the transaction if something failed
  $conn->rollback();
  echo "Error: ". $e->getMessage();
}finally{
  //Close the connection
  $conn = null;
}
//header("location: ../index.php",true,303);
?>
