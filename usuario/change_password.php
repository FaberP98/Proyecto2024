<?php
// Inicia la sesión para poder manejar validacion
session_start();

$userId = isset($_GET['id']) ? $_GET['id'] : null;

if (!$userId) {
    // Redirigir al usuario si no hay ID
    header("Location: recovery.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Incluye el archivo de scripts externos -->
    <?php include('vistas/script.php'); ?>
</head>

<body class="vh-100" style=" background: rgb(116, 231, 245);
    background: -moz-linear-gradient(203deg, rgba(116, 231, 245, 1) 0%, rgba(230, 230, 230, 1) 100%);
    background: -webkit-linear-gradient(203deg, rgba(116, 231, 245, 1) 0%, rgba(230, 230, 230, 1) 100%);
    background: linear-gradient(203deg, rgba(116, 231, 245, 1) 0%, rgba(230, 230, 230, 1) 100%);">

    <?php include('config/validacion.php'); ?>

    <!-- Incluye la barra de navegación -->
    <?php include('vistas/nav.php'); ?>

    <!-- Formulario para cambiar la contraseña -->
    <form action="config/change_password.php" method="post" class="validation" novalidate>
        <!-- Contenedor principal del formulario -->
        <div class="d-flex align-items-center flex-column border border-dark border-2 p-4 rounded-5 shadow-lg bg-white
            position-absolute top-50 start-50 translate-middle" style="margin-top: 2rem; width: 25rem;">
            <div class="d-flex justify-content-center">
                <img src="img/pregunta.svg" alt="recover-icon" style="height: 7rem;">
            </div>
            <div class="text-center fs-4 fw-semibold">Recuperar contraseña.</div>
            <!-- Campo oculto para almacenar el ID del usuario -->
            <input type="hidden" name="id" value="<?php echo $userId; ?>">
            <!-- Campo de entrada para la nueva contraseña -->
            <div class="input-group input-group-sm rounded mt-4">
                <span class="input-group-text bg-secondary rounded-start-3">
                    <span class="material-icons">lock</span>
                </span>
                <input type="password" class="form-control form-control-sm " id="nueva_contrasena" name="nueva_contrasena" placeholder="Nueva contraseña" required>
                <button type="button" class="btn btn-outline-secondary rounded-end-3" id="togglePassword">
                    <span class="material-icons" id="toggleIcon">visibility</span>
                </button>
                <div class="valid-feedback">
                    Correcto!
                </div>
                <div class="invalid-feedback">
                    Complete este campo.
                </div>
            </div>

            <!-- Campo de confirmación de la contraseña -->
            <div class="input-group input-group-sm rounded m-3">
                <span class="input-group-text bg-secondary rounded-start-3">
                    <span class="material-icons">lock</span>
                </span>
                <input type="password" class="form-control form-control-sm" id="confirmar_contrasena" name="confirmar_contrasena" placeholder="Confirmar contraseña" required>
                <button type="button" class="btn btn-outline-secondary rounded-end-3" id="toggleConfirmPassword">
                    <span class="material-icons" id="toggleConfirmIcon">visibility</span>
                </button>
                <div class="valid-feedback">
                    Correcto!
                </div>
                <div class="invalid-feedback">
                    Complete este campo.
                </div>
            </div>

            <!-- Botón para enviar la solicitud de cambio de contraseña -->
            <button type="submit" class="btn btn-info border border-dark rounded-start-3 mt-3">Recuperar contraseña</button>
        </div>
    </form>

    <script src="vistas/script.js"></script>

    <script>
        // Función para alternar la visibilidad de la contraseña
        function togglePassword(inputId, iconId) {
            var passwordInput = document.getElementById(inputId);
            var toggleIcon = document.getElementById(iconId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.textContent = 'visibility_off';
            } else {
                passwordInput.type = 'password';
                toggleIcon.textContent = 'visibility';
            }
        }

        // Evento para llamar a la función togglePassword cuando se hace clic en el botón de nueva contraseña
        document.getElementById('togglePassword').addEventListener('click', function() {
            togglePassword('nueva_contrasena', 'toggleIcon');
        });

        // Evento para llamar a la función togglePassword cuando se hace clic en el botón de confirmar contraseña
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            togglePassword('confirmar_contrasena', 'toggleConfirmIcon');
        });
    </script>

</body>

</html>