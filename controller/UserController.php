<?php
//session_start();
require_once dirname(__FILE__).'/../model/User.php';
require_once dirname(__FILE__).'/../logica/UserDAO.php';

class UserController {

  private $userDAO;
  private $currentUser;
  private $users = [];

  public function __CONSTRUCT(){
    $this->userDAO = new UserDAO();
  }

  public function checkLogin($username,$password){
    $currentUser = $this->userDAO->getUserByUsername($username);
    if($currentUser != null){
      if(password_verify($password,$currentUser->__GET('password'))){
        //Set some session variables
        $_SESSION['user_session']=$currentUser->__GET('code');
        $_SESSION['user_type']=$currentUser->__GET('userType');
        $this->indexPage();
      }else {
        $_SESSION['error']="La informacion ingresada es incorrecta";
        header("Location: index.php");
      }
    }
    /*require_once('view/header.php');
    require_once('includes/administrador.php');
    require_once('view/footer.php');*/
  }

  public function indexPage(){
    require_once("view/header.php");
    require_once("includes/administrador.php");
    require_once("view/footer.php");
  }

  public function listUsers(){
    return $this->userDAO->listUsers();
  }

  public function getPermissions($userId){
    return $this->userDAO->getPermissionsByUser($userId);
}

}


?>
