<?php

	require_once("../model/PersonasModel.php");
	require_once("../model/IngresoModel.php");
	$persona = new PersonasModel();
	$ingreso = new IngresoModel();
	require_once("../view/loginMarcarAcceso.php");

if (isset($_POST['btn-ingresar'])) {
    $ci = $_POST['login_ci'];
    $_SESSION['ci'] = $ci;
    $clave = $_POST['login_pass'];
    if ($persona->VerifyUser($ci, $clave) == true) {
        $persona->getRol($ci);
        $rol = $persona->getRol($ci);
        $ingreso->AddReg();
        $_SESSION['ok'] = "ok";
        $_SESSION['rol'] = $rol;
        $_SESSION['ci'] = $ci;
    } else {
        $_SESSION['ok'] = "no";
    }
}

if (isset($_POST['btn-ing-vist'])) {
		$ci = $_POST['ci'];
		$nombre = $_POST['nom'];
		$apellido = $_POST['ape'];
		$fecha = $_POST['date'];
		$motivo = $_POST['motivo'];
		$tel = $_POST['tel'];

		$persona->AddVisitante($ci,$nombre,$apellido,$fecha);
		$persona->AddTel($ci,$tel);
    	$ingreso->AddRegGVist($ci,$motivo);
		

	}




?>




