<?php
// Incluye el archivo de conexión a la base de datos
include ('conexion.php');

// Obtiene el código del proceso a eliminar desde la solicitud (request) HTTP
$Codigo = $_REQUEST['Codigo'];

$relacionConsulta = $con->query("SELECT * FROM tblactividad WHERE Proceso='$Codigo'");

if (mysqli_num_rows($relacionConsulta) > 0) {
    // Redirigir a la página 'perfiles.php' con un parámetro de error
    header('location:procesos.php');
    session_start();
    $_SESSION['status'] = 'relacion';
} else {
    // Ejecuta una consulta para eliminar el proceso de la tabla tblproceso donde el código coincide con el proporcionado
    $eliminar = $con->query("DELETE FROM tblproceso WHERE Codigo='$Codigo'");
    if ($eliminar) {
        // Redirigir a la página 'perfiles.php' con un parámetro de éxito
        header('location:procesos.php');
        session_start();
        $_SESSION['status'] = 'success';
    } else {
        // Redirigir a la página 'perfiles.php' con un parámetro de error
        header('location:procesos.php');
        session_start();
        $_SESSION['status'] = 'error';
    }
}

?>