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

    <!-- Formulario de recuperación de contraseña -->
    <form action="config/recovery.php" method="post" class="validation" novalidate>
        <div class="d-flex align-items-center flex-column border border-dark border-2 p-4 rounded-5 shadow-lg bg-white
            position-absolute top-50 start-50 translate-middle" style="margin-top: 2rem; width: 25rem;">
            <div class="d-flex justify-content-center">
                <img src="img/pregunta.svg" alt="recover-icon" style="height: 7rem;">
            </div>
            <div class="text-center fs-4 fw-semibold">¿Olvidaste tu contraseña? <br> Te ayudaremos a recuperarla.</div>
            <div class="text-center fs-6 fw-semibold mb-4">Ingrese el email con el que se registró.</div>
            <div class="input-group my-3 rounded">
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
                    Por favor complete este campo con su correo.
                </div>
            </div>
            <button type="submit" class="btn btn-info border border-dark rounded-start-3 mt-3">Recuperar contraseña</button>
        </div>
    </form>

    <script src="vistas/script.js"></script>
</body>

</html>