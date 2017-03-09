<?php
require_once dirname(__FILE__).'/../model/Product.php';
require_once dirname(__FILE__).'/../logica/ProductDAO.php';

class ProductController {

  private $productDAO;

  public function __CONSTRUCT(){
    $this->productDAO = new ProductDAO();
  }

  public function getProducts(){
    return $this->productDAO->listProducts();
  }
}
?>
