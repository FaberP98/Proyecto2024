<?php

include('conexion.php');
$Codigo=$_REQUEST['Codigo'];

$relacionConsulta = $con->query("SELECT * FROM tblmatrizpeligros WHERE DescripcionPeligro='$Codigo'");

if (mysqli_num_rows($relacionConsulta) > 0) {
    // Redirigir a la página 'perfiles.php' con un parámetro de error
    header('location:descripcion.php');
    session_start();
    $_SESSION['status']='relaciona';
} else {
    // Ejecuta una consulta para eliminar el perfil de la tabla tblperfil donde el código coincide con el proporcionado
    $eliminar = $con->query("DELETE FROM tbldescripcionpeligro WHERE Codigo='$Codigo'");
    if ($eliminar) {
        // Redirigir a la página 'perfiles.php' con un parámetro de éxito
        header('location:descripcion.php');
        session_start();
        $_SESSION['status']='successa';
    } else {
        // Redirigir a la página 'perfiles.php' con un parámetro de error
        header('location:descripcion.php');
        session_start();
        $_SESSION['status']='error';
    }
}


?>