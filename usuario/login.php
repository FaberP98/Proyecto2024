<?php
// Inicia la sesión para poder manejar validacion
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include('vistas/script.php'); ?>
</head>

<body class="vh-100 " style=" background: rgb(116, 231, 245);
    background: -moz-linear-gradient(203deg, rgba(116, 231, 245, 1) 0%, rgba(230, 230, 230, 1) 100%);
    background: -webkit-linear-gradient(203deg, rgba(116, 231, 245, 1) 0%, rgba(230, 230, 230, 1) 100%);
    background: linear-gradient(203deg, rgba(116, 231, 245, 1) 0%, rgba(230, 230, 230, 1) 100%);">

    <?php include('config/validacion.php'); ?>

    <?php include('vistas/nav.php'); ?>

    <form action="validar.php" method="post" class="validation" novalidate>
        <div class="d-flex align-items-center flex-column border border-dark border-2 p-3 rounded-5 shadow-lg
            position-absolute top-50 start-50 translate-middle" style="margin-top: 2rem; width: 25rem;
            background: rgb(248,254,255); /*color de fondo */
            background: linear-gradient(180deg, rgba(248,254,255,1) 0%, rgba(119,225,218,1) 100%);">
            <div class="d-flex justify-content-center">
                <img src="img/logouser.png" alt="login-icon" style="height: 7rem;">
            </div>
            <div class="border border-dark w-100 mt-2"></div>
            <div class="text-center fs-1 fw-semibold">Iniciar sesión</div>
            <div class="input-group mt-2 rounded">
                <div class="input-group-text bg-secondary rounded-start-3">
                    <span class="material-icons">
                        mail
                    </span>
                </div>
                <input class="form-control rounded-end-3" name="correo" type="email" placeholder="Correo Electrónico" required>
                <div class="valid-feedback">
                    Correcto!
                </div>
                <div class="invalid-feedback">
                    Ingrese su correo.
                </div>
            </div>
            <div class="input-group mt-4 rounded">
                <div class="input-group-text bg-secondary rounded-start-3">
                    <span class="material-icons">
                        lock
                    </span>
                </div>
                <input class="form-control rounded-end-3" name="contrasena" type="password" placeholder="Contraseña" required>
                <div class="valid-feedback">
                    Correcto!
                </div>
                <div class="invalid-feedback">
                    Ingrese su contraseña.
                </div>
            </div>
            <div class="d-flex mt-3">
                <div class="d-flex align-items-center me-5">
                    <input class="form-check-input border border-secondary" type="checkbox">
                    <div class="pt-1">Recordarme</div>
                </div>
                <div class="pt-1">
                    <a href="recovery.php" class="text-decoration-none fw-semibold fst-italic">¿Olvidaste tu contraseña?</a>
                </div>
            </div>
            <button type="submit" class="btn btn-light border border-dark rounded-start-3 mt-3">Ingresar</button>
        </div>
    </form>

    <script src="vistas/script.js"></script>
</body>

</html>