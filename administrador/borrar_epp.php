<?php
// Incluye el archivo de conexión a la base de datos
include ('conexion.php');

// Obtiene el código del elemento de protección personal (EPP) a eliminar desde la solicitud (request) HTTP
$Codigo = $_REQUEST['Codigo'];

$relacionConsulta = $con->query("SELECT * FROM tbleppmatrizpeligros WHERE CodigoElementosProteccionPersonal='$Codigo'");

if (mysqli_num_rows($relacionConsulta) > 0) {
    // Redirigir a la página 'perfiles.php' con un parámetro de error
    header('location:epp.php');
    session_start();
    $_SESSION['status'] = 'relacion';
} else {
    // Ejecuta una consulta para eliminar el EPP de la tabla tblelementosproteccionpersonal donde el código coincide con el proporcionado
    $eliminar = $con->query("DELETE FROM tblelementosproteccionpersonal WHERE Codigo='$Codigo'");
    if ($eliminar) {
        // Redirigir a la página 'epp.php' con un parámetro de éxito
        header('location:epp.php');
        session_start();
        $_SESSION['status'] = 'success';
    } else {
        // Redirigir a la página 'epp.php' con un parámetro de error
        header('location:epp.php');
        session_start();
        $_SESSION['status'] = 'error';
    }
}

?>