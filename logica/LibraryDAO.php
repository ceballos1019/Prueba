<?php
require_once dirname(__FILE__).'/../includes/config.php';

class LibraryDAO {

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
  * Get all the products
  * @return Array<Warehouse> Contain the Warehouses
  */
  public function listLibraries(){

    try{
      $libraryList = array();

      /*Prepare SQL statement*/
      $listQuery = $this->conn->prepare("SELECT * FROM libreria");
      $listQuery->execute();

      /*Iterate over the result set*/
      foreach ($listQuery->fetchAll(PDO::FETCH_OBJ) as $library) {

        /*Create the Warehouse object and set the properties*/
        $currentLibrary = new Library();
        $currentLibrary->__SET('code',$library->codigo);
        $currentLibrary->__SET('name',$library->nombre);
        $currentLibrary->__SET('address',$library->direccion);
        $currentLibrary->__SET('phoneNumber',$library->telefono);

        /*Add the library to the result set*/
        $libraryList[] = $currentLibrary;
      }

      return $libraryList;
    }catch(Exception $e){
      die($e->getMessage());
    }
  }
}
?>
