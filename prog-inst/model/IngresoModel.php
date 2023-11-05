<?php
	 class IngresoModel{
		
		//Declaramos atributos privados
		private $db;
	 
		//Declaramos un constructor que sirve para incializar los atributos
		public function __construct(){
			require_once("db/db.php");
			//Asignamos al atributo db el valor del metodo conexion() de la clase Conectar
			//Conectar es la clase y conexion es el metodo
			$this->db = Conexion::ConexionBD();
			//Determinamos que el atributo personas será un array
		
		}	

		function getIngresos(){
			//Realizamos la consulta y guardamos el resultado en la variable $result
			$result = $this->db->query("SELECT i.id_ingreso,i.fecha,i.hora,p.ci,p.nombre,p.rol,i.motivo 
			FROM ingreso i INNER JOIN persona p ON i.ci=p.ci");
			//Recorremos el array de la consulta y lo guardamos en la variable $row
			while($row = $result->fetch_assoc()){
				//Guardamos en el array $this->personas cada fila que devuelve la consulta
				$this->ingresos[]=$row;
			}
			//Devolvemos el array personas
			return $this->ingresos;

		}

		function getIngresosByCi($ci){
			//Realizamos la consulta y guardamos el resultado en la variable $result
			$stmt = $this->db->prepare("SELECT i.id_ingreso,i.fecha,i.hora,p.ci,p.nombre,p.rol,i.motivo 
			FROM ingreso i INNER JOIN persona p ON i.ci=p.ci WHERE p.ci = ?");
			$stmt->bind_param("s", $ci);
			$stmt->execute();
			$result = $stmt->get_result();
			//Recorremos el array de la consulta y lo guardamos en la variable $row
			while($row = $result->fetch_assoc()){
				//Guardamos en el array $this->personas cada fila que devuelve la consulta
				$this->ingresos[]=$row;
			}
			//Devolvemos el array personas
			return $this->ingresos;
		}
		
		function getIngresosById($id){
			// Prepare the SQL query with a placeholder for the id
			$stmt = $this->db->prepare("SELECT i.id_ingreso,i.fecha,i.hora,p.ci,p.nombre,p.rol,i.motivo 
			FROM ingreso i INNER JOIN persona p ON i.ci=p.ci WHERE i.id_ingreso = ?");
			// Bind the id parameter to the placeholder
			$stmt->bind_param("i", $id);
			// Execute the query
			$stmt->execute();
			// Get the result
			$result = $stmt->get_result();
			// Fetch the rows and store them in the $this->ingresos array
			while($row = $result->fetch_assoc()){
				$this->ingresos[]=$row;
			}
			// Return the array of ingresos
			return $this->ingresos;
		}

		function getIngresosByDateTime($date, $time){
			// Prepare the SQL query with placeholders for the date and time
			$stmt = $this->db->prepare("SELECT i.id_ingreso,i.fecha,i.hora,p.ci,p.nombre,p.rol,i.motivo 
			FROM ingreso i INNER JOIN persona p ON i.ci=p.ci WHERE i.fecha = ? AND i.hora = ?");
			// Bind the date and time parameters to the placeholders
			$stmt->bind_param("ss", $date, $time);
			// Execute the query
			$stmt->execute();
			// Get the result
			$result = $stmt->get_result();
			// Fetch the rows and store them in the $this->ingresos array
			while($row = $result->fetch_assoc()){
				$this->ingresos[]=$row;
			}
			// Return the array of ingresos
			return $this->ingresos;
		}

		function updateMotivo($id_ingreso, $new_motivo){
			// Prepare the SQL query with placeholders for the id and new motive
			$stmt = $this->db->prepare("UPDATE ingreso SET motivo = ? WHERE id_ingreso = ?");
			// Bind the new motive and id parameters to the placeholders
			$stmt->bind_param("si", $new_motivo, $id_ingreso);
			// Execute the query
			$stmt->execute();
			// Check if the update was successful
			if($stmt->affected_rows === 0){
				return false; // No rows were updated
			}else{
				echo "<script>alert('El motivo se actualizó correctamente.');</script>";
				return true; // The update was successful
			}
		}

		
		function deleteIngreso($id_ingreso){
		    // Prepare the SQL query with a placeholder for the id
		    $stmt = $this->db->prepare("UPDATE ingreso SET baja = 1 WHERE id_ingreso = ?");
		    // Bind the id parameter to the placeholder
		    $stmt->bind_param("i", $id_ingreso);
		    // Execute the query
		    $stmt->execute();
		    // Check if the update was successful
		    if($stmt->affected_rows === 0){
		        return false; // No rows were updated
		    }else{
		        echo "<script>alert('El ingreso se eliminó correctamente.');</script>";
		        return true; // The update was successful
		    }
		}


		public function AddReg() {
			// Obtenemos la fecha y hora actual
			$fecha = date("Y-m-d");
			$hora = date("H:i:s");
			
			// Suponiendo que $_SESSION['ci'] contiene el valor de 'ci' que deseas insertar
			$ci = $_SESSION['ci'];
			
			// Preparamos la consulta SQL con marcadores de posición
			$sql = "INSERT INTO ingreso (fecha, hora, ci) VALUES (?, ?, ?)";
			
			// Usamos sentencias preparadas para evitar la inyección SQL
			$stmt = $this->db->prepare($sql);
			if ($stmt) {
				// Ligamos los valores a los marcadores de posición y ejecutamos la consulta
				$stmt->bind_param("sss", $fecha, $hora, $ci);
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

		public function AddRegGVist($ci,$motivo) {
			// Obtenemos la fecha y hora actual
			$fecha = date("Y-m-d");
			$hora = date("H:i:s");
			

			
			// Preparamos la consulta SQL con marcadores de posición
			$sql = "INSERT INTO ingreso (fecha, hora, ci, motivo) VALUES (?, ?, ?, ?)";
			
			// Usamos sentencias preparadas para evitar la inyección SQL
			$stmt = $this->db->prepare($sql);
			if ($stmt) {
				// Ligamos los valores a los marcadores de posición y ejecutamos la consulta
				$stmt->bind_param("ssss", $fecha, $hora, $ci, $motivo);
				if ($stmt->execute()) {
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
