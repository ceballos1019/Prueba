<?php
require_once dirname(__FILE__).'/../includes/config.php';

class ProviderDAO {

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
  public function listProviders(){

    try{
      $providerList = array();

      /*Prepare SQL statement*/
      $listQuery = $this->conn->prepare("SELECT * FROM proveedor");
      $listQuery->execute();

      /*Iterate over the result set*/
      foreach ($listQuery->fetchAll(PDO::FETCH_OBJ) as $provider) {

        /*Create the Provider object and set the properties*/
        $currentProvider = new Provider();
        $currentProvider->__SET('code',$provider->codigo);
        $currentProvider->__SET('name',$provider->nombre);
        $currentProvider->__SET('address',$provider->direccion);
        $currentProvider->__SET('phoneNumber',$provider->telefono);
        $currentProvider->__SET('registerDate',$provider->fecha_registro);

        /*Add the provider to the result set*/
        $providerList[] = $currentProvider;
      }

      return $providerList;
    }catch(Exception $e){
      die($e->getMessage());
    }
  }
}
?>
