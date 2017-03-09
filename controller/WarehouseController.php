<?php
require_once dirname(__FILE__).'/../model/Warehouse.php';
require_once dirname(__FILE__).'/../logica/WarehouseDAO.php';

class WarehouseController {

  private $warehouseDAO;

  public function __CONSTRUCT(){
    $this->warehouseDAO = new WarehouseDAO();
  }

  public function getWarehouses(){
    return $this->warehouseDAO->listWarehouses();
  }
}
?>
