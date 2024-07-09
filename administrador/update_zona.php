<?php
// Incluye el archivo de conexión a la base de datos
include ('conexion.php');

// Verifica si se ha enviado un formulario con el campo 'zona_edit' no vacío
if (!empty($_POST['zona_edit'])) {
    // Obtiene el código de la zona a editar desde el formulario
    $codigo = $_POST['codigo_editar'];

    // Obtiene y sanitiza el nuevo nombre de la zona a través del formulario, convirtiéndolo a mayúsculas y minúsculas
    $newnombre = ucwords(strtolower($_POST['zona_edit']));

    // Verifica si el nuevo nombre ya existe en la base de datos
    $check_query = $con->query("SELECT COUNT(*) as count FROM tblzonalugar WHERE Nombre='$newnombre' AND Codigo != '$codigo'");
    $result = $check_query->fetch_assoc();
    $count = $result['count'];
    if ($count > 0) {
        // Si el nombre ya existe para otro registro, muestra un mensaje de error o toma alguna otra acción apropiada
        header('location:zonaslugares.php');
        session_start();
        $_SESSION['status'] = 'en_uso';

    } else {
        // Actualiza el nombre de la zona en la base de datos utilizando el código de la zona
        $upd = $con->query("UPDATE tblzonalugar SET Nombre='$newnombre' WHERE Codigo='$codigo'");

        // Verifica si la consulta de actualización se ejecutó correctamente
        if ($upd) {
            header('location:zonaslugares.php');
            session_start();
            $_SESSION['status'] = 'edit_exitoso';
            exit(); // Termina el script después de redirigir para evitar ejecución adicional.
        }
    }
}
?>