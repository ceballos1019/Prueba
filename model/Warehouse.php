<?php
/**
* Description of Warehouse class
* @package model
* @subpackage warehouse
* @author Andrés Ceballos Sánchez
* @version 1.0
*/
class Warehouse{
  /*Global variables*/
  private $code;
  private $name;
  private $location;

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
