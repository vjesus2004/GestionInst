<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITS | Marcar Ingreso</title>
    <link rel="stylesheet" href="view/css/estilos.css">
</head>

<body>
    <nav class="navbar">
        <div class="container">
                <div class="logo">
                    <img src="view/img/logo_utu_its.png" alt="Logo">
            </div>
            <a href="#" class="nav-link">Iniciar sesión</a>
        </div>
    </nav>

    <div class="login">
        <div class="login-container">
            <div class="left-section">
                <h2>Bienvenido</h2>
                <p>Por favor, ingrese sus datos.</p>
            </div>
            <div class="right-section">
                <form class="login-form" method="POST">
                    <input type="text" name="login_ci" class="input-field" placeholder="Cédula" required>
                    <input type="password" name="login_pass" class="input-field" placeholder="Pin" required>
                    <button type="submit" name="btn-ingresar" class="login-button">Marcar ingreso</button>
                    <button type="submit" class="visitor-button" onclick="openModal()">Soy Visitante</button>
                </form>
            </div>
        </div>
        <div class="container-reloj">
            <h1 id="time">00:00:00</h1>
            <p id="date">date</p>
        </div>

        
    </div>

    <div class="label_confirm">
            <label>Entrada registrada correctamente.</label>
        </div>

        <div id="modal" class="modal-container">
        <div class="modal-content">
            <h2>Visitante</h2>
            <input type="text" class="input-field" placeholder="Cedula">
            <input type="text" class="input-field" placeholder="Nombre">
            <input type="text" class="input-field" placeholder="Apellido">
            <input type="text" class="input-field" placeholder="Telefono">
            <span>Fecha de nacimiento</span>
            <input type="date" class="input-field date">
            <input type="text" class="input-field" placeholder="Motivo de consulta">
            <button class="visitor-button" onclick="closeModal()">Cerrar</button>
            <button class="visitor-button">Marcar ingreso</button>
        </div>
    </div>

    <script src="view/js/funciones_marcar.js"></script>

</body>

</html>

