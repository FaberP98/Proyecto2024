<?php
include('conexion.php');

if(!empty($_POST['Nombre_edit']) && !empty($_POST['Apellido_edit']) && isset($_POST['Cargo_edit'])  && !empty($_POST['codigo_editar'] && !empty($_POST['Correo_edit'] && !empty($_POST['Celular_edit'])))){
    $DocId = $_POST['codigo_editar'];
    $Nombres= ucwords(strtolower($_POST['Nombre_edit']));
    $Apellidos= ucwords(strtolower($_POST['Apellido_edit']));
    $Cargo = $_POST['Cargo_edit'];
    $Correo = $_POST['Correo_edit'];
    $Celular = ucwords(strtolower($_POST['Celular_edit']));

    // Verifica si el nuevo nombre ya existe en la base de datos
    $check_query = $con->query("SELECT COUNT(*) as count FROM tblempleado WHERE Nombres='$Nombres' AND DocId != '$DocId' AND Apellidos ='$Apellidos'");
    $result = $check_query->fetch_assoc();
    $count = $result['count'];

    if ($count > 0) {
        // Si el nombre ya existe para otro registro, muestra un mensaje de error o toma alguna otra acción apropiada
        header('location:empleados.php');
        session_start();
        $_SESSION['status'] = 'en_uso';

    } else {
        $upd = $con->query("UPDATE tblempleado SET Nombres='$Nombres', Apellidos='$Apellidos', Cargo='$Cargo', Correo='$Correo', Celular='$Celular' WHERE DocId='$DocId'");
        // Verifica si la consulta de actualización se ejecutó correctamente
        if ($upd) {
            header('location:empleados.php');
            session_start();
            $_SESSION['status'] = 'edit_exitoso';
            exit(); // Termina el script después de redirigir para evitar ejecución adicional.
        }
    }
}
?>
