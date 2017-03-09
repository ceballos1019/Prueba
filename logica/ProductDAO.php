<?php
require_once dirname(__FILE__).'/../includes/config.php';

class ProductDAO {

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
  * @return Array<Product> Contain the products
  */
  public function listProducts(){
    try{
      $productList = array();

      /*Prepare SQL statement*/
      $listQuery = $this->conn->prepare("SELECT * FROM producto");
      $listQuery->execute();

      /*Iterate over the result set*/
      foreach ($listQuery->fetchAll(PDO::FETCH_OBJ) as $product) {

        /*Create the User object and set the properties*/
        $currentProduct = new Product();
        $currentProduct->__SET('code',$product->codigo);
        $currentProduct->__SET('productName',$product->articulo);
        $currentProduct->__SET('unitCost',$product->costo_unitario);
        $currentProduct->__SET('orderPoint',$product->punto_pedido);
        $currentProduct->__SET('totalStocks',$product->existencias_totales);

        /*Add the user to the result set*/
        $productList[] = $currentProduct;
      }

      return $productList;
    }catch(Exception $e){
      die($e->getMessage());
    }
  }
}
?>
