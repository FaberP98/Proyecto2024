<?php
include('conexion.php');

if (!empty($_POST['Nombre']) && !empty($_POST['Proceso'])) {
    $Nombre = ucwords(strtolower($_POST['Nombre']));
    $Proceso = $_POST['Proceso'];

    $consulta = $con->query("SELECT * FROM tblactividad WHERE nombre='$Nombre'");

    // Verifica si se encontraron resultados en la consulta, lo que indica que el perfil ya existe
    if (mysqli_num_rows($consulta) > 0) {
        // Si el perfil ya existe, muestra una alerta y redirecciona a la página 'perfiles.php'
        header('location:actividades.php');
        session_start();
        $_SESSION['status'] = 'en_uso';
    } else {
        $insertar = $con->query("INSERT INTO tblactividad(Nombre, Proceso) VALUES ('$Nombre','$Proceso')");
        header('location:actividades.php');
        session_start();
        $_SESSION['status'] = 'agregada';
    }
}
?>
