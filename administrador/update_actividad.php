<?php
include ('conexion.php');

if (!empty($_POST['Nombre']) && !empty($_POST['Proceso']) && !empty($_POST['Codigo'])) {
    $Codigo = $_POST['Codigo'];
    $Nombre = ucwords(strtolower($_POST['Nombre']));
    $Proceso = $_POST['Proceso'];

    // Verifica si el nuevo nombre ya existe en la base de datos
    $check_query = $con->query("SELECT COUNT(*) as count FROM tblactividad WHERE Nombre='$Nombre' AND Codigo != '$Codigo'");
    $result = $check_query->fetch_assoc();
    $count = $result['count'];

    if ($count > 0) {
        // Si el nombre ya existe para otro registro, muestra un mensaje de error o toma alguna otra acción apropiada
        header('location:actividades.php');
        session_start();
        $_SESSION['status'] = 'en_uso';

    } else {
        $upd = $con->query("UPDATE tblactividad SET Nombre='$Nombre', Proceso='$Proceso' WHERE Codigo='$Codigo'");
        // Verifica si la consulta de actualización se ejecutó correctamente
        if ($upd) {
            header('location:actividades.php');
            session_start();
            $_SESSION['status'] = 'edit_exitoso';
            exit(); // Termina el script después de redirigir para evitar ejecución adicional.
        }
    }
}
?>