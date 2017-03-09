<?php 
	function conectar(){
	     $conexion= mysql_connect("localhost", "root","") or die("Problemas en la conexion ");
          mysql_select_db("inventario", $conexion) or die("Problemas con la base de datos");
		  return $conexion;	  
}
?>