<?php 
$rol = $_SESSION['rol'];

$visual="none";
 if ($rol=="adm"){
        $visual="block";
 }
?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/css/estilos.css">
    <script src="https://kit.fontawesome.com/3ee734fc3f.js" crossorigin="anonymous"></script>
    <style>
        
        .tab_adm {
            display: <?php echo $visual; ?>;    
        }
        .popup {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .popup-contenido {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            display: flex;
            flex-direction: column;
            border-radius: 15px;
            box-sizing: border-box;
        }

        .popup-contenido-txt {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .popup-contenido-txt input{
            margin-bottom: 7%;
        }

        .popup-ver-tel {
            align-items: start;
        }

        .popup-cambiar-pin {
            width: 20%;
        }

        .popup-cerrar {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .popup-cerrar:hover,
        .popup-cerrar:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .info{
            display: flex;
            flex-direction: column;
            width: 50%;
            margin-right: 5%;
            background-color: #ffffff;
            border-radius: 15px;
        }

        .info-user{
            display: flex;
            flex-direction: column;
            padding: 3%;
            background-color: #ffffff;
            border-radius: 15px;
        }

        .banner-img{
            width: 100%;
            height: 100%;
            border-radius: 15px 15px 0px 0px;
        }
        
        .banner{
            width: 100%;
            height: 200px;
        }
    </style>
</head>
<body>
    <div class="nav">  
        <div class="logo">
            <div class="menu-toggle">&#9776;</div>
            <img src="../view/img/logo_utu_its.svg" alt="Logo">
        </div>
        <div class="sesion">
            <a href=""><i class="fa-solid fa-right-from-bracket"></i>Cerrar sesión</a>
        </div>
    </div>

    
    <div class="page">
        <div class="menu">
            <h1>Menú</h1>
            <ul>
                <li><a href="InfoController.php">Informacion personal</a></li>
                <li class="tab_adm"  ><a href="UserCrudController.php">Gestionar Usuarios</a></li>
                <li class="tab_adm"  ><a href="IngresosCrudController.php">Gestionar ingresos</a></li>
                <li><a href="IngresoController.php">Marcar acceso</a></li>
            </ul>
        </div>

        <div class="content perfil">
            <div class="info">
                <div class="banner">
                    <img class="banner-img" src="../view/img/banner-perfil.jpg" alt="banner">
                </div>

                <div class="info-user">
                    <div style="display: flex; width: 100%;">
                    <div class="perfil-col-1">

                        <div style="display:flex">
                            <h2><?php foreach ($pers_data as $data) { echo $data['nombre'];}?> <?php foreach ($pers_data as $data) { echo $data['apellido'];}?></h2>
                        </div>
                            
                        <div>
                            <h4>Cédula</h4>
                            <p><?php foreach ($pers_data as $data) { echo $data['ci'];}?></p>
                        </div>

                        <div>
                            <h4>Fecha de nacimiento:</h4>
                            <p><?php foreach ($pers_data as $data) { echo $data['fech_nac'];}?></p>
                        </div>
                        </div>
                        <div class="perfil-col-2">
                        <div>
                            <h3>Telefono:</h3>
                            <button class="btn" id="btn-ver-tel" onclick="abrirPopup('popup-ver-tel')">Ver telefonos</button>
                        </div>

                        <div>
                            <h3>Rol:</h3>
                            <p><?php foreach ($pers_data as $data) { 
                                if($data['rol']=="est"){
                                    echo "Estudiante";
                                }else if($data['rol']=="adm"){
                                    echo "Administrativo";
                                }else  if($data['rol']=="visit"){
                                    echo "Visitante";
                                }else  if($data['rol']=="docente"){
                                    echo "Docente";
                                }else  if($data['rol']=="func"){
                                    echo "Funcionario";
                                    }
                                }?></p>
                        </div>

                        <div>
                            <h3>Pin:</h3>
                            <button class="btn" id="btn-cambiar-pin" onclick="abrirPopup('popup-cambiar-pin')">Cambiar pin</button>
                        </div>
                    </div>
                

                    </div>
                </div>
            </div>
            
            

            <div class="info-ingresos-user">
                <div>
                    <h4>Actividad de ingresos</h4>
                </div>
                <div>
                    <h5>Ultimo ingreso:</h5>
                    <p>25/01/2023 - 10:45 AM</p>
                </div>
                <div>
                    <h5>Cant. ingresos registrados:</h5>
                    <p>20</p>
                </div>
                
            </div>
        </div>

        <div id="popup-ver-tel" class="popup">
            <div class="popup-contenido popup-ver-tel">
                <table class="tabla-predet">
                    <tr>
                        <th>Teléfonos</th>
                    </tr>
                    <?php foreach ($tel_pers as $data) { echo "<tr><td>".$data['tel']."</td></tr>";}?>
                </table>
                <button class="btn-2" onclick="cerrarPopup('popup-ver-tel')">Cerrar</button>
            </div>
        </div>

        <div id="popup-cambiar-pin" class="popup">
            <div class="popup-contenido popup-cambiar-pin">
                <div class="popup-contenido-txt">
                <h2>Cambiar pin</h2>
                    <input type="text" class="cuadros-texto" placeholder="Pin actual">
                    <input type="text" class="cuadros-texto" placeholder="Nuevo pin">
                    <input type="text" class="cuadros-texto" placeholder="Confirmar nuevo pin">
                </div>
                <div>
                    <button class="btn" onclick="guardarNuevoPin()">Guardar</button>
                    <button class="btn-2" onclick="cerrarPopup('popup-cambiar-pin')">Cerrar</button>
                </div>
            </div>
        </div>

    </div>
    
    <script src="../view/js/menu.js"></script>
    <script>
        function abrirPopup(idPopup) {
            var popup = document.getElementById(idPopup);
            popup.style.display = "block";
        }

        function cerrarPopup(idPopup) {
            var popup = document.getElementById(idPopup);
            popup.style.display = "none";
        }

        function guardarNuevoPin() {
            // Agrega aquí tu código para guardar el nuevo pin
            cerrarPopup('popup-cambiar-pin');
        }
    </script>
</body>
</html>
