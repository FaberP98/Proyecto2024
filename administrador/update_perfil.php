<?php
// Incluye el archivo de conexión
include ('conexion.php');

// Verifica si se ha enviado un formulario con el campo 'perfil_edit' no vacío
if (!empty($_POST['perfil_edit'])) {
    // Obtiene el código del perfil a editar desde el formulario
    $codigo = $_POST['perfil_editar'];

    // Obtiene y sanitiza el nuevo nombre del perfil a través del formulario, convirtiéndolo a mayúsculas y minúsculas
    $newnombre = ucwords(strtolower($_POST['perfil_edit']));

    // Verifica si el nuevo nombre ya existe en la base de datos
    $check_query = $con->query("SELECT COUNT(*) as count FROM tblperfil WHERE Nombre='$newnombre' AND Codigo != '$codigo'");
    $result = $check_query->fetch_assoc();
    $count = $result['count'];

    if ($count > 0) {
        // Si el nombre ya existe para otro registro, muestra un mensaje de error o toma alguna otra acción apropiada
        echo "El nombre '$newnombre' ya está en uso.";
        header('location:perfiles.php');
        session_start();
        $_SESSION['status'] = 'en_uso';

    } else {
        // Actualiza el nombre del perfil en la base de datos utilizando el código del perfil
        $upd = $con->query("UPDATE tblperfil SET Nombre='$newnombre' WHERE Codigo='$codigo'");

        // Verifica si la consulta de actualización se ejecutó correctamente
        if ($upd) {
            header('location:perfiles.php');
            session_start();
            $_SESSION['status'] = 'edit_exitoso';
            exit(); // Termina el script después de redirigir para evitar ejecución adicional.
        }
    }
}

?>