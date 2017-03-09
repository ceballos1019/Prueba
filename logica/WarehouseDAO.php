<?php
require_once dirname(__FILE__).'/../includes/config.php';

class WarehouseDAO {

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
  public function listWarehouses(){

    try{
      $warehouseList = array();

      /*Prepare SQL statement*/
      $listQuery = $this->conn->prepare("SELECT * FROM bodega");
      $listQuery->execute();

      /*Iterate over the result set*/
      foreach ($listQuery->fetchAll(PDO::FETCH_OBJ) as $warehouse) {

        /*Create the Warehouse object and set the properties*/
        $currentWarehouse = new Warehouse();
        $currentWarehouse->__SET('code',$warehouse->codigo);
        $currentWarehouse->__SET('name',$warehouse->nombre);
        $currentWarehouse->__SET('location',$warehouse->ubicacion);

        /*Add the warehouse to the result set*/
        $warehouseList[] = $currentWarehouse;
      }

      return $warehouseList;
    }catch(Exception $e){
      die($e->getMessage());
    }
  }
}
?>
