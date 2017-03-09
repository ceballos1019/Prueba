<?php
require_once dirname(__FILE__).'/../model/Library.php';
require_once dirname(__FILE__).'/../logica/LibraryDAO.php';

class LibraryController {

  private $libraryDAO;

  public function __CONSTRUCT(){
    $this->libraryDAO = new LibraryDAO();
  }

  public function getLibraries(){
    return $this->libraryDAO->listLibraries();
}
}

?>
