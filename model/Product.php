<?php
/**
* Description of Product class
* @package model
* @subpackage product
* @author Andrés Ceballos Sánchez
* @version 1.0
*/
class Product{
  /*Global variables*/
  private $code;
  private $productName;
  private $unitCost;
  private $orderPoint;
  private $totalStocks;

  /**
  * [__GET Getter Method]
  * @param  $k
  * @return
  */
  public function __GET($k){
    return $this->$k;
  }

  /**
  * [__SET Setter Method]
  * @param  [type] $k [key]
  * @param  [type] $v [value]
  * @return [type]    [description]
  */
  public function __SET($k, $v){
    return $this->$k = $v;
  }
}
?>
