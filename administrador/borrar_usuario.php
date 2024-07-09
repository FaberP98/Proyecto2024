<?php
// Incluye el archivo de conexión a la base de datos
include ('conexion.php');

$codigo = $_GET['del_codigo'];

$eliminar = $con->query("DELETE FROM tblusuario WHERE DocId='$codigo'");
    if ($eliminar) {
        // Redirigir a la página 'perfiles.php' con un parámetro de éxito
        header('location:registrar_usuario.php');
        session_start();
        $_SESSION['del'] = true;
    } else {
        // Redirigir a la página 'perfiles.php' con un parámetro de error
        header('location:registrar_usuario.php');
        session_start();
        $_SESSION['del'] = false;
    }
?>