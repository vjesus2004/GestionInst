<?php

	require_once("model/PersonasModel.php");

	$persona = new PersonasModel();
 
	require_once("view/loginIniciarSesion.php");
	session_start();
	unset($_SESSION['rol']);
		if(isset($_POST['btn-ingresar'])){
			$ci = $_POST['login_ci'];
			$_SESSION['ci'] =$ci;
			$clave = $_POST['login_pass'];
			if($persona->VerifyUser($ci,$clave)==true){

				$rol = $persona->getRol($ci);
				$_SESSION['rol'] = $rol;
				$_SESSION['ci'] = $ci;		
				
                echo "<script>document.location.href = 'controller/InfoController.php';</script>";	
			}
		}

?>

