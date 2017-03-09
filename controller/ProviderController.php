<?php
require_once dirname(__FILE__).'/../model/Provider.php';
require_once dirname(__FILE__).'/../logica/ProviderDAO.php';

class ProviderController {

  private $providerDAO;

  public function __CONSTRUCT(){
    $this->providerDAO = new ProviderDAO();
  }

  public function getProviders(){
    return $this->providerDAO->listProviders();
}
}

?>
