<?php
session_start();
if(!isset($_SESSION['user_session'])){
  if(isset($_POST['submit_login'])){
    require_once (dirname(__FILE__).'/controller/UserController.php');
    $uc = new UserController();
    call_user_func(array($uc,'checkLogin'),'admin','admin');
  } else {
    require_once(dirname(__FILE__).'/view/header.php');
    require_once(dirname(__FILE__).'/login.php');
    require_once(dirname(__FILE__).'/view/footer.php');
  }
}else if($_SESSION['user_type']=='1'){
    require_once(dirname(__FILE__)."/view/header.php");
    require_once(dirname(__FILE__)."/includes/administrador.php");
    require_once(dirname(__FILE__)."/view/footer.php");
}
else{
  include("includes/test.php");
}
?>
