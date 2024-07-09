<?php
if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
    if ($status == 'error') {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Usuario no existe, por favor verificar los datos'
                });
            </script>";
    } elseif ($status == 'mal') {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Las contraseñas no coinciden. Por favor, inténtelo de nuevo.'
                });
            </script>";
    } elseif ($status == 'ok') {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'Por favor revisa tu correo electronico.'
                });
            </script>";
    } elseif ($status == 'bien') {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: '¡Actualización Exitosa!',
                    text: 'La contraseña se ha actualizado correctamente. Por favor, inicia sesión con tu nueva contraseña.'
                });
            </script>";
    } elseif ($status == 'error-envio') {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Algo salió mal, intenta de nuevo.'
                });
            </script>";
    } elseif ($status == 'inicio') {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Por favor debes iniciar sesión.'
                });
            </script>";
    } 
}
unset($_SESSION['status']);
?>