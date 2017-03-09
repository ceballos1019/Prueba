<?php
/**
* Description of Provider class
* @package model
* @subpackage provider
* @author Andrés Ceballos Sánchez
* @version 1.0
*/
class Provider{
  /*Global variables*/
  private $code;
  private $name;
  private $address;
  private $phoneNumber;
  private $registerDate;

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
