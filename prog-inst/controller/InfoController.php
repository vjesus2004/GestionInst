<?php

	require_once("../model/PersonasModel.php");
	session_start();
	$persona = new PersonasModel();
	$pers_data= $persona->GetPersonaSpec();
	$tel_pers= $persona->getTelPers();
	require_once("../view/info.php");
	
?>




