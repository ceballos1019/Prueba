<?php
session_start();
class User2{
	private $db;

	//Set the database
	function __construct($DB_con){
		$this->db = $DB_con;
	}

	public function checkLogin($username,$password){
		try{
			//Prepare SQL statement and bind parameters
			$login_query = $this->db->prepare("SELECT * FROM usuario WHERE username = :username LIMIT 1");
			$login_query->bindParam(':username',$username);

			//Execute the query and fetch the register
			$login_query->execute();

			//Retrieve the row
			$result = $login_query->fetch(PDO::FETCH_ASSOC);

			if($login_query->rowCount() > 0){

				//Check the password
				if(password_verify($password,$result['password'])){
					//Set some session variables
					$_SESSION['user_session']=$result['codigo'];
					$_SESSION['user_type']=$result['tipo_usuario'];
					return true;
				}
			}
		} catch(PDOException $e){
			echo $e->getMessage();
		}finally{
			//Close the connection
			$db = null;
		}
	}
}
?>
