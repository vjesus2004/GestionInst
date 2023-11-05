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
            <h1>Listado de usuarios</h1>
            <div class="crud">
                <div class="opciones-crud">
                    <div class="crear-bajas">
                        <button type="button" class="btn-agregar-user btn" onclick="abrirPopupAddUser()">Nuevo usuario</button>
                        <button type="button" class="btn-ver-user-eliminado btn" onclick="abrirPopupUserElim()">Usuarios eliminados</button>
                    </div>

                    <div class="filtrar-buscar">
                    <FORM method="POST">
                        <div style="display:flex">
                            <input type="text" class="cuadros-texto" placeholder="Buscar usuario..." name="buscar-user-txt">
                            <button class="btn" name="buscar-user-btn"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></button>
                        </div>
                        <div>
                            <select class="select-style" name="select-filtros">
                                <option value="">Ordenar por</option>
                                <option value="ci">Cédula</option>
                                <option value="nombre">Nombre</option>
                                <option value="apellido">Apellido</option>
                                <option value="fech_nac">Edad</option>
                                <option value="rol">Rol</option>
                            </select>
                            <select class="select-style">
                                <option value="">Ascendente</option>
                                <option value="">Descendente</option>
                            </select>
                        </div>
                    </FORM>
                    </div>
                </div>
                <div class="tabla">
                    <table class="tabla-usuarios">
                        <tr>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Edad</th>
                            <th>Teléfonos</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                        <?php
                                
                            if(isset($datos)){

                                foreach ($datos as $dato) {
                                    echo "<tr><td>".$dato["ci"]."</td><td>".$dato["nombre"]."</td><td>".$dato["apellido"]."</td><td>".$dato["fech_nac"].
                                    "<td><button id='ver-tel' onclick='verTelefonos()' style='background: none; color: #103cea; border: none;'>Ver teléfonos</button></td></td><td>".$dato["rol"]."</td><td>
                                    <i id='accion-editar' onclick='abrirPopupEditar(\"".$dato['ci']."\",\"".$dato['nombre']."\",\"".$dato['apellido']."\",\"".$dato['fech_nac']."\",\"".$dato['rol']."\")' class='fa-regular fa-pen-to-square' style='color: #103cea; margin-right: 6px;'></i>
                                    <i id='accion-borrar' onclick='confirmarBorrar(\"".$dato['ci']."\")' class='fa-regular fa-trash-can' style='color: #ff0000;'></i></td></tr>";

                                    }
                                }
                                         
                        ?>
                    </table>
                </div>

                <div id="popup-agregar-user" class="popup-usuarios">
                    <h1>Crear ussuario</h1>
                    <h3>Cedula</h3>
                    <input type="text" placeholder="Cedula" name="ci" class="cuadros-texto">
                    <h3>Nombre</h3>
                    <input type="text" placeholder="Nombre" name="nom" class="cuadros-texto">
                    <h3>Apellido</h3>
                    <input type="text" placeholder="Apellido" name="ape" class="cuadros-texto">
                    <h3>Teléfono</h3>
                    <input type="text" name="phone" placeholder="Teléfono" name="tel" class="cuadros-texto">
                    <h3>Fecha de nacimiento</h3>
                    <input type="date" name="date" class="cuadros-texto">
                    <h3>Rol</h3>
                    <select name="rol" class="select-style">
                        <option value="">Seleccione un rol</option>
                        <option value="">Administrativo</option>
                        <option value="">Docente</option>
                        <option value="">Estudiante</option>
                        <option value="">Funcionario</option>
                    </select>
                    <div class="popup-buttons">
                        <button id="guardar" name="btn-add" class="btn">Guardar</button>
                        <button id="cancelar" class="btn-2" onclick="cerrarPopupAddUser()">Cancelar</button>
                    </div>
                </div>
<form method="POST">
                <div id="popup-editar-user" class="popup-usuarios">
                    <h2>Editar usuario</h2>
                    <h3>Cedula</h3>
                    <input type="text" placeholder="Cedula" name="ci-editar" class="cuadros-texto" id="cedula-editar" readonly />
                    <h3>Nombre</h3>
                    <input type="text" placeholder="Nombre" name="nom-editar" class="cuadros-texto" id="nombre-editar">
                    <h3>Apellido</h3>
                    <input type="text" placeholder="Apellido" name="ape-editar" class="cuadros-texto" id="apellido-editar">
                    <h3>Fecha de Nacimiento</h3>
                    <input type="date" name="date-editar" class="cuadros-texto" id="fecha_nac-editar">
                    <h3>Rol</h3>
                    <select name="rol-editar" id="rol-editar" class="select-style">
                                    <option value="adm">Administrativo</option>
                                    <option value="docente">Docente</option>
                                    <option value="est">Estudiante</option>
                                    <option value="func">Funcionario</option>
                                    <option value="visit">Visitante</option>
                                </select>
                    <div class="popup-buttons">
                        <button name="btn-edit" class="btn">Guardar</button>
                        <button class="btn-2" onclick="cerrarPopupEditar()">Cancelar</button>
                    </div>
                </div>
                </form>

                <div id="popup-borrar-user" class="popup-borrar">
                    <h3>¿Está seguro que desea dar de baja este usuario?</h3>
                    <button id="confirmar-borrar" class="btn-3" name="confirmar-borrar-user">Confirmar</button>
                    <button id="cancelar-borrar" class="btn-2" onclick="cerrarPopupBorrar()">Cancelar</button>
                </div>

                <div id="popup-telefonos" class="popup-usuarios">
                    <h2>Teléfonos</h2>
                    <table class="tabla-predet">
                        <tr>
                            <th>Cédula</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                        <tr>
                            <?php
                                
                                if(isset($datos)){
    
                                    foreach ($datos as $dato) {
                                        echo "<tr>
                                            <td>".$dato["ci"]."</td>
                                            <td>".$dato["rol"]."</td>
                                        <td><i id='accion-editar' onclick='abrirPopupEditarTel(\"".$dato['rol']."\")' class='fa-regular fa-pen-to-square' style='color: #103cea; margin-right: 6px;'></i>
                                        <i id='accion-borrar' onclick='confirmarBorrarTel(\"".$dato['rol']."\")' class='fa-regular fa-trash-can' style='color: #ff0000;'></i>
                                        </td>
                                        </tr>";
    
                                        }
                                    }
                                             
                            ?>
                        </tr>
                    </table>
                    <div class="popup-buttons">
                        <button class="btn">Guardar</button>
                        <button class="btn-2" onclick="cerrarPopupTelefonos()">Cerrar</button>
                    </div>

                </div>

                <div id="popup-borrar-tel" class="popup-borrar">
                    <h3>¿Está seguro que desea dar de baja este teléfono?</h3>
                    <button id="confirmar-borrar-tel" class="btn-3" name="confirmar-borrar-tel">Confirmar</button>
                    <button id="cancelar-borrar-tel" class="btn-2" onclick="cerrarPopupBorrarTel()">Cancelar</button>
                </div>

                <div id="popup-editar-tel" class="popup-usuarios">
                    <h2>Editar Teléfono</h2>
                    <input type="text" placeholder="Teléfono" name="editar-tel" class="cuadros-texto" id="tel-editar">
                    <div class="popup-buttons">
                        <button name="btn-edit" class="btn">Guardar</button>
                        <button class="btn-2" onclick="cerrarPopupEditarTel()">Cancelar</button>
                    </div>
                </div>

                <div id="popup-user-elim" class="popup-usuarios">
                    <h2>Usuarios eliminados</h2>
                    <div style="display:flex;">
                        <input type="text" class="cuadros-texto" placeholder="Buscar usuario..." name="buscar-user-txt" style="width: 50%;">
                        <button class="btn" name="buscar-user-btn" style="height: 32px;"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></button>
                    </div>
                    <div class="tabla">
                        <table class="tabla-usuarios" style="margin-top: 10px;">
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                            <?php
                                    
                                if(isset($datos_baja)){

                                    foreach ($datos_baja as $dato_b) {
                                        echo "<tr><td>".$dato_b["ci"]."</td><td>".$dato_b["nombre"]."</td><td>".$dato_b["apellido"]."</td><td>".$dato["rol"].
                                        "</td><td><i id='accion-reactivar' onclick='' class='fa-solid fa-arrow-up' style='color: #088000; margin-right: 6px;'></i></td></tr>";

                                        }
                                    }
                                            
                            ?>
                        </table>
                    </div>
                    <div class="popup-buttons">
                        <button name="btn-edit" class="btn">Guardar</button>
                        <button class="btn-2" onclick="cerrarPopupUserElim()">Cancelar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <script src="../view/js/menu.js"></script>
    <script src="../view/js/funciones_crud_usuarios.js"></script>
</body>
</html>
