<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Fijo en Pantalla Grande con Columnas</title>
    <link rel="stylesheet" href="../view/css/estilos.css">
    <script src="https://kit.fontawesome.com/3ee734fc3f.js" crossorigin="anonymous"></script>
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
                <li><a href="UserCrudController.php">Gestionar Usuarios</a></li>
                <li><a href="IngresosCrudController.php">Gestionar ingresos</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Listado de ingresos</h1>
            <div class="crud">
                <div>
                    <input type="button" value="Registros eliminados" onclick="abrirPopupIngElim()" class="btn">
                </div>
                <div class="opciones-crud">
                    <div class="filtrar-buscar">
                    <FORM method ="POST">
                        <div>
                            <select class="select-style" name="select-filtros" id="select-filtros">
                                <option value="">Ver todos</option>
                                <option value="id_ingreso">ID</option>
                                <option value="fyh">Fecha y hora</option>
                                <option value="ci">Cédula</option>
                            </select>
                            
                            <input type="text" class="cuadros-texto" name ="text-buscar" id="text-buscar" disabled/>
                            <input type="date" class="cuadros-texto" name = "input-fecha" id="input-fecha" style="display: none;">
                            <input type="time" class="cuadros-texto" name ="input-hora" id="input-hora" style="display: none;">
                            <button class="btn" id="btn-buscar" name="buscar-ing-btn" disabled><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></button>
                                                    
                        </div>
                        </FORM>
                        <div>
                        <select class="select-style">
                                    <option value="">Ordenar por</option>
                                    <option value="">ID</option>
                                    <option value="">Fecha</option>
                                    <option value="">Hora</option>
                                    <option value="">Cédula</option>
                                    <option value="">Nombre</option>
                                    <option value="">Rol</option>
                                    <option value="">Motivo</option>
                                </select>
                                <select class="select-style">
                                    <option value="">Ascendente</option>
                                    <option value="">Descendente</option>
                                </select>
                        </div>
                </div>

                </div>
                <div class="tabla">
                    <table class="tabla-ingresos">
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Rol</th>
                            <th>Motivo</th>
                            <th>Acciones</th>
                        </tr>
                        <tr>
                        <?php
                                
                            if(isset($datos)){
                                foreach ($datos as $dato) {
                                echo "<tr><td>".$dato["id_ingreso"]."</td><td>".$dato["fecha"]."</td><td>".$dato["hora"]
                                ."</td><td>".$dato["ci"]."</td><td>".$dato["nombre"]."</td><td>".$dato["rol"]."</td><td>"
                                .$dato["motivo"]."</td><td>
                                <i id='accion-editar' onclick='abrirPopupEditar(\"".$dato['id_ingreso']."\",\"".$dato['fecha']."\",\"".$dato['hora']."\",\"".$dato['ci']."\",\"".$dato['motivo']."\")' class='fa-regular fa-pen-to-square' style='color: #103cea; margin-right: 6px;'></i>
                                <i id='accion-borrar' onclick='confirmarBorrar(\"".$dato['id_ingreso']."\")' class='fa-regular fa-trash-can' style='color: #ff0000;'></i></td></tr>";}
                                }
                                         
                        ?>
                        </tr>
                    </table>
                </div>
                                <FORM METHOD ="POST">
                <div id="popup-editar" class="popup-usuarios">
                    <h2>Editar ingreso</h2>
                    <h3>Id ingreso</h3>
                    <input type="text" class="cuadros-texto" name="id-ingreso-editar" id="id-ingreso-editar" readonly/>
                    <h3>Fecha</h3>
                    <input type="date" class="cuadros-texto" id="date-editar" disabled/>
                    <h3>Hora</h3>
                    <input type="time" class="cuadros-texto" id="time-editar" disabled/>
                    <h3>Cédula</h3>
                    <input type="text" class="cuadros-texto" id="ci-editar" disabled/>
                    <h3>Motivo</h3>
                    <input type="text" class="cuadros-texto" name="motivo-editar" id="motivo-editar">
                    <div class="popup-buttons">
                        <button name="btn_guardar_m" id="guardar" name="btn-edit" class="btn">Guardar</button>
                        <button id="cancelar" class="btn-2" onclick="cerrarPopupEditar()">Cancelar</button>
                    </div>
                                </FORM>
                </div>

                <div id="popup-borrar" class="popup-borrar">
                    <h2>¿Está seguro que desea dar de baja este registro de ingreso?</h2>
                    <div class="popup-buttons">
                        <button id="confirmar-baja" name="btn-baja-ingreso" class="btn-3">Confirmar</button>
                        <button id="cancelar" class="btn-2" onclick="cerrarPopupBorrar()">Cancelar</button>
                    </div>
                </div>

                <div id="popup-ing-elim" class="popup-usuarios popup-ing-elim">
                    <h2>Ingresos eliminados</h2>
                    <div style="display:flex;">
                        <input type="text" class="cuadros-texto" placeholder="Buscar ingreso..." name="buscar-ing-txt" style="width: 50%;">
                        <button class="btn" name="buscar-ing-btn" style="height: 32px;"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></button>
                    </div>
                    <div class="tabla">
                        <table class="tabla-ingresos" style="margin-top: 10px;">
                            <tr>
                                <th>Id</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Rol</th>
                                <th>Motivo</th>
                                <th>Acciones</th>
                            </tr>
                            <?php
                                    
                                if(isset($datos)){

                                    foreach ($datos as $dato) {
                                        echo "<tr><td>".$dato["id_ingreso"]."</td><td>".$dato["fecha"]."</td><td>".$dato["hora"]
                                        ."</td><td>".$dato["ci"]."</td><td>".$dato["nombre"]."</td><td>".$dato["rol"]."</td><td>"
                                        .$dato["motivo"]."</td><td><i id='accion-reactivar' onclick='' class='fa-solid fa-arrow-up' style='color: #088000; margin-right: 6px;'></i></td></tr>";
                                        }
                                    }
                                            
                            ?>
                        </table>
                    </div>
                    <div class="popup-buttons">
                        <button name="btn-react-ing" class="btn">Guardar</button>
                        <button class="btn-2" onclick="cerrarPopupIngElim()">Cancelar</button>
                    </div>
                </div>
        </div>
    </div>
    
    <script> 
        
    </script>

    <script src="../view/js/menu.js"></script>
    <script src="../view/js/funciones_crud_ingresos.js"></script>
</body>
</html>
