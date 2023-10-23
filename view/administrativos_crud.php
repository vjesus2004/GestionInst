<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Fijo en Pantalla Grande con Columnas</title>
    <link rel="stylesheet" href="view/css/estilos.css">
</head>

<body>
    <div class="crud-usuarios">

    </div>
    <div class="nav">
        <div class="menu-toggle">&#9776;</div>
        <img src="view/img/logo_utu_its.svg" alt="Logo">
    </div>
    <div class="page">
        <div class="menu">
            <h1>Menú</h1>
            <ul>
                <li><a href="#">Informacion personal</a></li>
                <li><a href="#">Gestionar Usuarios</a></li>
                <li><a href="#">Gestionar ingresos</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Listado de usuarios</h1>
            <div class="crud">
            
                <div class="menu-crud">
                    <div class="crear">
                        <button type="button">Crear</button>
                            <div id="popup" class="popup-usuarios">
                                <h1>Crear Usuario</h1>
                                <h3>Cedula</h3>
                                <input type="text" placeholder="Campo 1">
                                <h3>Nombre</h3>
                                <input type="text" placeholder="Campo 2">
                                <h3>Apellido</h3>
                                <input type="text" placeholder="Campo 3">
                                <h3>Fecha de nacimiento</h3>
                                <input type="date" placeholder="Campo 4">
                                <h3>Pin</h3>
                                <input type="password" placeholder="Campo 5">
                                <h3>Rol</h3>
                                <select name="" id="">
                                    <option value="">Administrativo</option>
                                    <option value="">Docente</option>
                                    <option value="">Estudiante</option>
                                    <option value="">Funcionario</option>
                                    
                                </select>
                                <div class="popup-buttons">
                                    <button id="guardar">Guardar</button>
                                    <button id="cancelar">Cancelar</button>
                                </div>
                            </div>
                        <select >
                            <option value="">Ver todos los usuarios</option>
                            <option value="">Ver administrativos</option>
                            <option value="">Ver estudiantes</option>
                            <option value="">Ver docentes</option>
                            <option value="">Ver funcionarios</option>
                            <option value="">Ver visitantes</option>
                        </select>
                    </div>
                    <div class="buscar">
                        <input type="text" placeholder="Buscar usuario..." id="">
                    </div>
                </div>
                <div class="tabla">
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var menu = document.querySelector('.menu');
            var menuToggle = document.querySelector('.menu-toggle');
            var content = document.querySelector('.content');

            menuToggle.addEventListener('click', function() {
                menu.classList.toggle('open');
                content.classList.toggle('open');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var crearButton = document.querySelector('.crear button');
            var popup = document.getElementById('popup');
            var cancelarButton = document.getElementById('cancelar');
            var guardarButton = document.getElementById('guardar');

            crearButton.addEventListener('click', function() {
                popup.style.display = 'block';
            });

            cancelarButton.addEventListener('click', function() {
                popup.style.display = 'none';
            });

            guardarButton.addEventListener('click', function() {
                // Aquí puedes agregar el código para guardar la información
                // y luego cerrar el popup si es necesario.
                // Por ejemplo:
                // GuardarDatos();
                // popup.style.display = 'none';
            });
        });
    </script>
</body>
</html>
