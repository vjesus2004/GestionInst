<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITS | Iniciar Sesión</title>
    <link rel="stylesheet" href="view/css/estilos.css">
</head>

<body>
    <div class="login-iniciar-sesion">
        <div class="nav-container">
            <div class="nav">  
                <div class="logo" style="padding: 10px">
                    <img src="view/img/logo_utu_its.svg" alt="Logo">
                </div>
            </div>
        </div>
        

        <div class="login">
            <div class="login-container">
                <div class="bienvenido-container">
                    <h2>Bienvenido</h2>
                    <p>Para iniciar sesión, ingrese sus datos.</p>
                </div>
                <div class="right-section">
                    <form class="login-form" method="POST">
                        <input type="text" name="login_ci" class="input-field" placeholder="Cédula" required>
                        <input type="password" name="login_pass" class="input-field" placeholder="Pin" required>
                        <button type="submit" name="btn-ingresar" class="login-button">Iniciar Sesion</button>
                    </form>
                </div>
            </div>
        </div>

        
    </div>
        
        
</body>

</html>

