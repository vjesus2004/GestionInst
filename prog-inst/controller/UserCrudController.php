<?php
session_start();
require_once("../model/PersonasModel.php");

$persona = new PersonasModel();




if (isset($_POST['guardar'])) {
    $ci = $_POST['ci'];
    $nombre = $_POST['nom'];
    $apellido = $_POST['ape'];
    $tel = $_POST['tel'];
    $correo = $_POST['email'];
    $calle = $_POST['calle'];
    $nPuerta = $_POST['npuerta'];
    $tipo = $_POST['tipo'];
    $clave = $_POST['pass'];

    $persona->insertPersonas($ci, $nombre, $apellido, $tel, $correo, $calle, $nPuerta, $tipo, $clave);

    echo "<script> location.href = location.href;</script>";
}

if (isset($_POST['btn-add'])) {
    $ci = $_POST['ci'];
    $nombre = $_POST['nom'];
    $apellido = $_POST['ape'];
    $fecha = $_POST['date'];
    $tel = $_POST['tel'];
	$rol = $_POST['rol'];

    $persona->AddPersona($ci, $nombre, $apellido, $fecha,$rol);
    $persona->AddTel($ci, $tel);
}

if (isset($_POST['buscar-user-btn'])){
    
        if(isset($_POST['select-filtros'])){
   
                        if($_POST['buscar-user-txt'] == ""){
                
                    $datos = $persona->getPersonas();
                }else 
                 if($_POST['select-filtros'] == 'rol'){
                
                    $datos = $persona->getPersonasByRol($_POST['buscar-user-txt']);
                
                }else if($_POST['select-filtros'] == 'ci'){
                    
                    $datos = $persona->getPersonasByCi($_POST['buscar-user-txt']);
                  
                
                }else if($_POST['select-filtros'] == 'nombre'){
                
                    $datos = $persona->getPersonasByNombre($_POST['buscar-user-txt']);
                
                }else if($_POST['select-filtros'] == 'apellido'){
                
                    $datos = $persona->getPersonasByApellido($_POST['buscar-user-txt']);
                
                }else if($_POST['select-filtros'] == 'fecha'){
                
                    $datos = $persona->getPersonasByFecha($_POST['buscar-user-txt']);
                
                }
    }
}

$datos_baja = $persona->getPersonasBaja();  

if(isset($_POST['btn-edit'])){
    $persona->updatePersona($_POST['ci-editar'], $_POST['nom-editar'], $_POST['ape-editar'],
     $_POST['date-editar'], $_POST['rol-editar']);





}    require_once("../view/usuarios_crud.php");

?>

