<?php
if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
    if ($status == 'relacion') {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se puede eliminar el $pagina porque está relacionado con otros registros'
                });
            </script>";
    } elseif ($status == 'relaciona') {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se puede eliminar la $pagina porque está relacionada con otros registros'
                });
            </script>";
    } elseif ($status == 'success') {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'El $pagina se eliminó exitosamente'
                });
            </script>";
    } elseif ($status == 'successa') {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Éxito',
                    text: 'La $pagina se eliminó exitosamente'
                });
            </script>";
    } elseif ($status == 'error') {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un problema al eliminar el $pagina'
                });
            </script>";
    } elseif ($status == 'en_uso') {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El nombre ya está en uso. Por favor, elija otro nombre.'
                });
            </script>";
    } elseif ($status == 'edit_exitoso') {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title:'¡Actualización Exitosa!',
                    text: 'Los datos han sido actualizados correctamente.'
                });
            </script>";
    } elseif ($status == 'agregado') {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: '¡Nuevo $pagina  agregado!',
                text: 'El nuevo $pagina  se ha agregado correctamente.'
            });
        </script>";
    } elseif ($status == 'agregada') {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: '¡Nueva $pagina  agregada!',
            text: 'La nueva $pagina  se ha agregado correctamente.'
                });
            </script>";
    }
}
unset($_SESSION['status']);
?>