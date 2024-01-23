<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="normalize.css">
                <!-- Font Awesome -->
                <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
                integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
                crossorigin="anonymous"
                referrerpolicy="no-referrer"
            />
            <link rel="icon" href="img/Group 298 (1).png" type="image/png">
    <title>Login</title>
</head>
<body>
    <div class="div-padre">
        <img class="div-padre-img" src="img/Rectangle 99.png" alt="">

        <img class="div-padre-img-arsol_logo" src="img/Logo Grupo Arsol 3.png" alt="">
    </div>
    <div class="div-formulario-login">

        <div class="div-formulario-login-info">
            <img src="img/Group 298.png" alt="Imagen de fondo">
        </div>
        
            <h2 class="
            ">¡Bienvenido de nuevo!</h2>
        
            <form action="_functions.php"  method="POST" class="div-form-inf">
                <div class="input-group">
                    <input class="input-group-name" type="text" id="username" name="username" placeholder="  Nombre de usuario">
                </div>
        
                <div class="input-group">
                    <input class="input-group-password" type="password" id="password" name="password" placeholder="  Contraseña">
                    <input type="hidden" name="accion" value="acceso_user">
                </div>
        
                <div class="input-group">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Recordar contraseña</label>
                </div>
                <button class="btn-entrar" type="submit" value="Guardar" name="registrar">Entrar</button>
            </form>
            <a class="div-olvidaste-password" href="#">¿Olvidaste tu contraseña?</a>
        
    </div>
    <script src="login.js"></script>
</body>
</html>