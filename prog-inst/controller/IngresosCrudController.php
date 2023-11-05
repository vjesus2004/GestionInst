<?php
session_start();
require_once("../model/PersonasModel.php");
require_once("../model/IngresoModel.php");

$persona = new PersonasModel();
$ingresos = new IngresoModel();


if(isset($_POST['btn_guardar_m'])){
    $ingresos->updateMotivo($_POST['id-ingreso-editar'],$_POST['motivo-editar']);
}

if(isset($_POST['buscar-ing-btn'])){
    if(isset($_POST['select-filtros'])){
        if($_POST['text-buscar'] == ""){
            $datos = $ingresos->getIngresos();
        }else
        if($_POST['select-filtros'] == "id_ingreso"){
            $datos_id = $ingresos->getIngresosById($_POST['text-buscar']);
            $datos = $datos_id;
            
        }else if($_POST['select-filtros'] == "fyh"){
            $datos = $datos_date;
            $datos_date = $ingresos->getIngresosByDateTime( $_POST['input-fecha'],$_POST['input-hora']);
        }else if($_POST['select-filtros'] == "ci"){
            $datos_ci = $ingresos->getIngresosByCi($_POST['text-buscar']);
            $datos = $datos_ci;
        }
        
    }
    
}




require_once("../view/ingresos_crud.php");


?>
