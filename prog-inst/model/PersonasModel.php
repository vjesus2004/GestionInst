<?php
	class PersonasModel{
		
		//Declaramos atributos privados
		private $db;
		private $personas;
		private $rol;
	 
		//Declaramos un constructor que sirve para incializar los atributos
		public function __construct(){
			require_once("db/db.php");
			//Asignamos al atributo db el valor del metodo conexion() de la clase Conectar
			//Conectar es la clase y conexion es el metodo
			$this->db = Conexion::ConexionBD();
			//Determinamos que el atributo personas será un array
		


		}

        public function VerifyUser($ci, $clave) {
            $sql = "SELECT * FROM persona WHERE ci='$ci' AND pass='$clave';";
            $result = $this->db->query($sql);
        
            $num_rows = mysqli_num_rows($result);
        
            if ($num_rows > 0) {
                $this->getRol($ci);
            } else {
                echo "<script>alert(\"Los datos son incorrectos, intente de nuevo.\");document.location='../'</script>";
            }
        
            // El método devuelve la cantidad de filas
            return $num_rows;
        }
        
        public function getRol($ci) {
            
			$sql = "SELECT rol FROM persona WHERE ci='$ci'";
			$consulta = $this->db->query($sql);
			$columna = $consulta->fetch_assoc();
			$rol = $columna['tipo'];
			return $rol;
        }
        
        
        


        }




        
    