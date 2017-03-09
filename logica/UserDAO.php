<?php
require_once dirname(__FILE__).'/../includes/config.php';

class UserDAO {
  /*Variable to handle the database connection*/
  private $conn;

  /*Constructor method*/
  public function __CONSTRUCT(){
    try{
      //Create connnection
      $this->conn = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE,DB_USERNAME,DB_PASSWORD);
      //Set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
      die($e->getMessage());
    }
  }

  /**
  * Get all the users
  * @return Array<User> Contain the users
  */
  public function listUsers(){
    try{
      $userList = array();

      /*Prepare SQL statement*/
      $listQuery = $this->conn->prepare("SELECT * FROM usuario");
      $listQuery->execute();

      /*Iterate over the result set*/
      foreach ($listQuery->fetchAll(PDO::FETCH_OBJ) as $user) {

        /*Create the User object and set the properties*/
        $currentUser = new User();
        $currentUser->__SET('code',$user->codigo);
        $currentUser->__SET('idCard',$user->cedula);
        $currentUser->__SET('name',$user->nombres);
        $currentUser->__SET('lastName',$user->apellidos);
        $currentUser->__SET('username',$user->username);
        $currentUser->__SET('password',$user->password);
        $currentUser->__SET('userType',$user->tipo_usuario);

        /*Add the user to the result set*/
        $userList[] = $currentUser;
      }

      return $userList;
    }catch(Exception $e){
      die($e->getMessage());
    }
  }

  /**
  * Get the id with the id specified
  * @param  Integer $id user identification number
  * @return User     User with the $id specified
  */
  public function getUserById($id){
    try{

      /*Prepare the SQL statement, bind parameters and execute the query*/
      $userQuery = $this->conn->prepare("SELECT * FROM usuario WHERE cedula = :idCard");
      $userQuery->bindParam(':idCard', $id);
      $userQuery->execute();
      $userResult = $userQuery->fetch(PDO::FETCH_OBJ);

      /*Check if the user exists in the database*/
      if($userQuery->rowCount() > 0){

        /*Create the User object and set the properties*/
        $user = new User();
        $user->__SET('code',$userResult->codigo);
        $user->__SET('idCard',$userResult->cedula);
        $user->__SET('name',$userResult->nombres);
        $user->__SET('lastName',$userResult->apellidos);
        $user->__SET('username',$userResult->username);
        $user->__SET('password',$userResult->password);
        $user->__SET('userType',$userResult->tipo_usuario);
        return $user;
      }

      /*Return null if the user does not exist in the database*/
      return null;
    } catch(Exception $e){
      die($e->getMessage());
    }
  }

  /**
  * Get the id with the id specified
  * @param  Integer $id user identification number
  * @return User     User with the $id specified
  */
  public function getUserByUsername($username){
    try{
      /*Prepare the SQL statement, bind parameters and execute the query*/
      $userQuery = $this->conn->prepare("SELECT * FROM usuario WHERE username = :username");
      $userQuery->bindParam(':username', $username);
      $userQuery->execute();
      $userResult = $userQuery->fetch(PDO::FETCH_OBJ);

      /*Check if the user exists in the database*/
      if($userQuery->rowCount() > 0){

        /*Create the User object and set the properties*/
        $user = new User();
        $user->__SET('code',$userResult->codigo);
        $user->__SET('idCard',$userResult->cedula);
        $user->__SET('name',$userResult->nombres);
        $user->__SET('lastName',$userResult->apellidos);
        $user->__SET('username',$userResult->username);
        $user->__SET('password',$userResult->password);
        $user->__SET('userType',$userResult->tipo_usuario);
        return $user;
      }

      /*Return null if the user does not exist in the database*/
      return null;
    } catch(Exception $e){
      die($e->getMessage());
    }
  }


  /**
  * Delete a user
  * @param  Integer $id id card of the user to be deleted
  */
  public function deleteUser($id){
    try{
      /*Prepare the SQL statement and bind parameters*/
      $deleteQuery = $this->conn->prepare("DELETE FROM usuario WHERE cedula = :idCard");
      $deleteQuery->bindParam('idCard', $id);
      $deleteQuery->execute();
    }catch(Exception $e){
      die($e->getMessage());
    }
  }

  /**
  * Update the user's data
  * @param  User   $newUser Object with the new data
  */
  public function updateUser(User $newUser){
    try{
      /*Sql statement*/
      $updateQueryString = "UPDATE usuario SET
      nombres = :name,
      apellido = :lastName,
      username = :username,
      password = :password,
      tipo_usuario = :userType
      WHERE cedula = :idCard";

      /*Bind parameters and execute the query*/
      $updateQuery = $this->conn->prepare($updateQueryString);
      $updateQuery->bindParam(':idCard',$newUser->__GET('idCard'));
      $updateQuery->bindParam(':name',$newUser->__GET('name'));
      $updateQuery->bindParam(':lastName',$newUser->__GET('lastName'));
      $updateQuery->bindParam(':username',$newUser->__GET('username'));
      $updateQuery->bindParam(':password',$newUser->__GET('password'));
      $updateQuery->bindParam(':userType',$newUser->__GET('userType'));
      $updateQuery->execute();
    }catch(Exception $e){
      die($e->getMessage());
    }
  }

  /**
  * Add a new user
  * @param User $user User to be added
  */
  public function addUser(User $user){
    try{
      /*Prepare SQL statement and bind parameters*/
      $insertQuery = $this->conn->prepare("INSERT INTO usuario(cedula,nombres,apellidos,username,password,tipo_usuario)
      VALUES(:cedula,:nombres,:apellidos,:username,:password,:tipo_usuario)");
      $insertQuery->bindParam(':cedula',$user->idCard);
      $insertQuery->bindParam(':nombres',$user->name);
      $insertQuery->bindParam(':apellidos',$user->lastName);
      $insertQuery->bindParam(':username',$user->username);
      $insertQuery->bindParam(':password',$user->password);
      $insertQuery->bindParam(':tipo_usuario',$user->userType);

      //Execute the query
      $insertQuery->execute();
    }catch(Exception $e){
      die($e->getMessage());
    }
  }

  /**
  * Get the user permissions
  * @param  Integer $userId user identification number
  * @return      User with the $id specified
  */
  public function getPermissionsByUser($userId){
      $permissionsArray = array();
    try{
      /*Prepare the SQL statement, bind parameters and execute the query*/
      $permissionsQuery = $this->conn->prepare("SELECT * FROM permisoxusuario WHERE usuario_codigo = :userId");
      $permissionsQuery->bindParam(':userId', $userId);
      $permissionsQuery->execute();

      foreach ($permissionsQuery->fetchAll(PDO::FETCH_OBJ) as $permission) {
        $permissionsArray[] = $permission->permiso_codigo;
      }

      /*Return null if the user does not exist in the database*/
      return $permissionsArray;
    } catch(Exception $e){
      die($e->getMessage());
    }
  }
}

?>
