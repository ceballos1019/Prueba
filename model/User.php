<?php
  define('MAX_PERMISSIONS',3);
/**
 * Description of User class
 * @package model
 * @subpackage user
 * @author Andrés Ceballos Sánchez
 * @version 1.0
 */
class User
{

    /*Global variables*/
    private $code;
    private $idCard;
    private $name;
    private $lastName;
    private $username;
    private $password;
    private $userType;

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
