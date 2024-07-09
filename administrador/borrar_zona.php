<?php
// Incluye el archivo de conexión a la base de datos
include ('conexion.php');

// Obtiene el código de la zona a eliminar desde la solicitud (request) HTTP
$Codigo = $_REQUEST['Codigo'];

$relacionConsulta = $con->query("SELECT * FROM tblmatrizpeligros WHERE ZonaLugar='$Codigo'");

if (mysqli_num_rows($relacionConsulta) > 0) {
    // Redirigir a la página 'perfiles.php' con un parámetro de error
    header('location:zonaslugares.php');
    session_start();
    $_SESSION['status'] = 'relaciona';
} else {
    // Ejecuta una consulta para eliminar la zona de la tabla tblzonalugar donde el código coincide con el proporcionado
    $eliminar = $con->query("DELETE FROM tblzonalugar WHERE Codigo='$Codigo'");
    if ($eliminar) {
        // Redirigir a la página 'perfiles.php' con un parámetro de éxito
        header('location:zonaslugares.php');
        session_start();
        $_SESSION['status'] = 'successa';
    } else {
        // Redirigir a la página 'perfiles.php' con un parámetro de error
        header('location:zonaslugares.php');
        session_start();
        $_SESSION['status'] = 'error';
    }
}
?>