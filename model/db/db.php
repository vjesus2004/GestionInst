<?php
	class Conexion{
		
		//Declarar propiedades o métodos de clases como estáticos 
		//los hacen accesibles sin la necesidad de instanciar la clase.
		public static function ConexionBD(){
			$conn = new mysqli("localhost", "root", "", "gestion_de_instituto");
			//Soluciona problemas con caracteres
			$conn->query("SET NAMES 'utf8'"); // IMPORTANTE
			//Devuelve la conexion
			return $conn;
		}
		
	}
?>
