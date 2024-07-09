<?php
// Incluir el archivo de conexión a la base de datos
include ('conexion.php');

// Obtiene el código de la clasificación a eliminar desde la solicitud (request) HTTP
$Codigo = $_REQUEST['Codigo'];

$relacionConsulta = $con->query("SELECT * FROM tbldescripcionpeligro WHERE Clasificacion='$Codigo'");
if (mysqli_num_rows($relacionConsulta) > 0) {
    // Redirigir a la página 'perfiles.php' con un parámetro de error
    header('location:clasificacion.php');
    session_start();
    $_SESSION['status'] = 'relaciona';
} else {
    // Ejecuta una consulta para eliminar la clasificación de peligro de la tabla tblclasificacionpeligro donde el código coincide con el proporcionado
    $eliminar = $con->query("DELETE FROM tblclasificacionpeligro WHERE Codigo='$Codigo'");
    if ($eliminar) {
        // Redirigir a la página 'perfiles.php' con un parámetro de éxito
        header('location:clasificacion.php');
        session_start();
        $_SESSION['status'] = 'successa';
    } else {
        // Redirigir a la página 'perfiles.php' con un parámetro de error
        header('location:clasificacion.php');
        session_start();
        $_SESSION['status'] = 'error';
    }
}
?>