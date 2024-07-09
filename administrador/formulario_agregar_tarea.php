<?php
include('conexion.php');

if (!empty($_POST['Nombre']) && !empty($_POST['Actividad']) && isset($_POST['Rutinario'])) {
    $Nombre = ucwords(strtolower($_POST['Nombre']));
    $Actividad = $_POST['Actividad'];
    $Rutinario = $_POST['Rutinario'];

    $consulta = $con->query("SELECT * FROM tbltarea WHERE nombre='$Nombre'");

    // Verifica si se encontraron resultados en la consulta, lo que indica que el perfil ya existe
    if (mysqli_num_rows($consulta) > 0) {
        // Si el perfil ya existe, muestra una alerta y redirecciona a la página 'perfiles.php'
        header('location:tareas.php');
        session_start();
        $_SESSION['status'] = 'en_uso';
    } else {
        $insertar = $con->query("INSERT INTO tbltarea(Nombre, Actividad, Rutinario) VALUES ('$Nombre','$Actividad','$Rutinario')");
        header('location:tareas.php');
        session_start();
        $_SESSION['status'] = 'agregada';
    }
}
?>
