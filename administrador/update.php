<?php
include('conexion.php');

if(!empty($_POST['Nombre']) && !empty($_POST['Actividad']) && isset($_POST['Rutinario'])  && !empty($_POST['Codigo'])){
    $Codigo = $_POST['Codigo'];
    $Nombre = ucwords(strtolower($_POST['Nombre']));
    $Actividad = $_POST['Actividad'];
    $Rutinario= $_POST['Rutinario'];

    // Verifica si el nuevo nombre ya existe en la base de datos
    $check_query = $con->query("SELECT COUNT(*) as count FROM tbltarea WHERE Nombre='$Nombre' AND Codigo != '$Codigo'");
    $result = $check_query->fetch_assoc();
    $count = $result['count'];

    if ($count > 0) {
        // Si el nombre ya existe para otro registro, muestra un mensaje de error o toma alguna otra acción apropiada
        header('location:tareas.php');
        session_start();
        $_SESSION['status'] = 'en_uso';

    } else {
        $upd = $con->query("UPDATE tbltarea SET Nombre='$Nombre', Actividad='$Actividad', Rutinario='$Rutinario' WHERE Codigo='$Codigo'");
        // Verifica si la consulta de actualización se ejecutó correctamente
        if ($upd) {
            header('location:tareas.php');
            session_start();
            $_SESSION['status'] = 'edit_exitoso';
            exit(); // Termina el script después de redirigir para evitar ejecución adicional.
        }
    }
}
?>
