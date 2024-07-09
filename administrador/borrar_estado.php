<?php
// Incluye el archivo de conexión a la base de datos
include ('conexion.php');

// Obtiene el código del estado a eliminar desde la solicitud (request) HTTP
$Codigo = $_REQUEST['Codigo'];

$relacionConsulta = $con->query("SELECT * FROM tblmatrizpeligros WHERE Estado='$Codigo'");

if (mysqli_num_rows($relacionConsulta) > 0) {
    // Redirigir a la página 'perfiles.php' con un parámetro de error
    header('location:estados.php');
    session_start();
    $_SESSION['status'] = 'relacion';
} else {
    // Ejecuta una consulta para eliminar el estado de la tabla tblestado donde el código coincide con el proporcionado
    $eliminar = $con->query("DELETE FROM tblestado WHERE Codigo='$Codigo'");
    if ($eliminar) {
        // Redirigir a la página 'perfiles.php' con un parámetro de éxito
        header('location:estados.php');
        session_start();
        $_SESSION['status'] = 'success';
    } else {
        // Redirigir a la página 'perfiles.php' con un parámetro de error
        header('location:estados.php');
        session_start();
        $_SESSION['status'] = 'error';
    }
}
?>