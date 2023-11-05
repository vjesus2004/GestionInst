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

		function getPersonas(){
			//Realizamos la consulta y guardamos el resultado en la variable $result
			$result = $this->db->query("SELECT ci, nombre, apellido,  fech_nac, pass, rol, nuevo, baja FROM persona");
			//Recorremos el array de la consulta y lo guardamos en la variable $row
			while($row = $result->fetch_assoc()){
				//Guardamos en el array $this->personas cada fila que devuelve la consulta
				$this->personas[]=$row;
			}
			//Devolvemos el array personas
			return $this->personas;

		}

		function getPersonasBaja(){
			// Realizamos la consulta y guardamos el resultado en la variable $result
			$result = $this->db->query("SELECT ci, nombre, apellido, fech_nac, pass, rol, nuevo, baja 
			FROM persona WHERE baja = 1");
			// Recorremos el array de la consulta y lo guardamos en la variable $row
			while($row = $result->fetch_assoc()){
				// Guardamos en el array $this->personas cada fila que devuelve la consulta
				$this->personas[]=$row;
			}
			// Devolvemos el array personas
			return $this->personas;
		}

		function getPersonasByCi($ci){
			$stmt = $this->db->prepare("SELECT ci, nombre, apellido,  fech_nac, pass, rol, nuevo, baja FROM persona WHERE ci = ?");
			$stmt->bind_param("s", $ci);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc()){
				$this->personas[]=$row;
			}
			return $this->personas;
		}
		
		function getPersonasByFecha($fecha){
			$stmt = $this->db->prepare("SELECT ci, nombre, apellido,  fech_nac, pass, rol, nuevo, baja FROM persona WHERE fech_nac = ?");
			$stmt->bind_param("s", $fecha);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc()){
				$this->personas[]=$row;
			}
			return $this->personas;
		}
		
		function getPersonasByNombre($nombre){
			$stmt = $this->db->prepare("SELECT ci, nombre, apellido,  fech_nac, pass, rol, nuevo, baja FROM persona WHERE nombre = ?");
			$stmt->bind_param("s", $nombre);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc()){
				$this->personas[]=$row;
			}
			return $this->personas;
		}
		
		function getPersonasByApellido($apellido){
			$stmt = $this->db->prepare("SELECT ci, nombre, apellido,  fech_nac, pass, rol, nuevo, baja FROM persona WHERE apellido = ?");
			$stmt->bind_param("s", $apellido);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc()){
				$this->personas[]=$row;
			}
			return $this->personas;
		}
		
		function getPersonasByRol($rol){
			$stmt = $this->db->prepare("SELECT ci, nombre, apellido,  fech_nac, pass, rol, nuevo, baja FROM persona WHERE rol = ?");
			$stmt->bind_param("s", $rol);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc()){
				$this->personas[]=$row;
			}
			return $this->personas;
		}

		function getPersonaSpec(){
			$ci = $_SESSION['ci'];
			//Realizamos la consulta y guardamos el resultado en la variable $result
			$result = $this->db->query("SELECT ci, nombre, apellido,  fech_nac, pass, rol, nuevo, baja FROM persona WHERE ci=$ci");
			//Recorremos el array de la consulta y lo guardamos en la variable $row
			while($row = $result->fetch_assoc()){
				//Guardamos en el array $this->personas cada fila que devuelve la consulta
				$this->personas[]=$row;
			}
			//Devolvemos el array personas
			return $this->personas;

		}

		function getTelPers(){
			$ci = $_SESSION['ci'];
			$result = $this->db->query("SELECT tel FROM tel_persona WHERE ci=$ci");
			while($row = $result->fetch_assoc()){
				$this->personas[]=$row;
			}
			return $this->personas;
		}

		function updatePersona($ci, $new_nombre, $new_apellido, $new_fech_nac, $new_rol){
			// Prepare the SQL query with placeholders for the ci and new details
			$stmt = $this->db->prepare("UPDATE persona SET nombre = ?, apellido = ?, fech_nac = ?, rol = ? WHERE ci = ?");
			// Bind the new details and ci parameter to the placeholders
			$stmt->bind_param("ssssi", $new_nombre, $new_apellido, $new_fech_nac, $new_rol, $ci);
			// Execute the query
			$stmt->execute();
			// Check if the update was successful
			if($stmt->affected_rows === 0){
				return false; // No rows were updated
			}else{
				echo "<script>alert('Los detalles de la persona se actualizaron correctamente.');</script>";
				return true; // The update was successful
			}
		}

        public function VerifyUser($ci, $clave) {
            $sql = "SELECT * FROM persona WHERE ci='$ci' AND pass='$clave';";
            $result = $this->db->query($sql);
        
            $num_rows = mysqli_num_rows($result);
        
            if ($num_rows > 0) {
                $this->getRol($ci);
            } else {
                echo "<script>alert(\"Los datos son incorrectos, intente de nuevo.\");document.location=''</script>";
            }
        
            // El método devuelve la cantidad de filas
            return $num_rows;
        }
        
        public function getRol($ci) {
            
			$sql = "SELECT rol FROM persona WHERE ci='$ci'";
			$consulta = $this->db->query($sql);
			$columna = $consulta->fetch_assoc();
			$rol = $columna['rol'];
			return $rol;
        }
        
        public function AddVisitante($ci, $nombre, $apellido, $fecha) {
			// Utilizamos sentencias preparadas para evitar la inyección SQL
			$sql = "INSERT INTO persona (ci, nombre, apellido, fech_nac, pass, rol) VALUES (?, ?, ?, ?, '9999', 'visit')";

			$stmt = $this->db->prepare($sql);
			if ($stmt) {
				// Ligamos los valores a los marcadores de posición y ejecutamos la consulta
				$stmt->bind_param("ssss", $ci, $nombre, $apellido, $fecha);
				if ($stmt->execute()) {
					// La inserción fue exitosa, puedes hacer algo aquí si es necesario
					return true;
					
				} else {
					// La inserción falló, obtenemos información detallada del error de MySQL
					return "Error: " . $stmt->error;
				}
				
				// Cerramos la sentencia preparada
				$stmt->close();
			} else {
				return false;
			}
		}
 	
		public function AddPersona($ci, $nombre, $apellido, $fecha,$rol) {
			// Utilizamos sentencias preparadas para evitar la inyección SQL
			$sql = "INSERT INTO persona (ci, nombre, apellido, fech_nac, pass, rol) VALUES (?, ?, ?, ?, '1111', ?)";
	
			$stmt = $this->db->prepare($sql);
			if ($stmt) {
				// Ligamos los valores a los marcadores de posición y ejecutamos la consulta
				$stmt->bind_param("sssss", $ci, $nombre, $apellido, $fecha, $rol);
				if ($stmt->execute()) {
					// La inserción fue exitosa, puedes hacer algo aquí si es necesario
					return true;
					
				} else {
					// La inserción falló, obtenemos información detallada del error de MySQL
					return "Error: " . $stmt->error;
				}
				
				// Cerramos la sentencia preparada
				$stmt->close();
			} else {
				return false;
			}
		}

		public function AddTel($ci, $tel) {
			// Utilizamos sentencias preparadas para evitar la inyección SQL
			$sql = "INSERT INTO tel_persona (ci, tel) VALUES (?, ?)";
			
			$stmt = $this->db->prepare($sql);
			if ($stmt) {
				// Ligamos los valores a los marcadores de posición y ejecutamos la consulta
				$stmt->bind_param("ss", $ci, $tel);
				$stmt->execute();
				
				// Verificamos si la inserción fue exitosa
				if ($stmt->affected_rows > 0) {
					// La inserción fue exitosa, puedes hacer algo aquí si es necesario
					return true;
				} else {
					// La inserción falló
					return false;
					
				}
				
				// Cerramos la sentencia preparada
				$stmt->close();
			} else {
				return false;
			}
		}
        


        }




        
    