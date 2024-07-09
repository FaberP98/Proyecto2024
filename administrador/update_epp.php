<?php
// Incluir el archivo de conexión a la base de datos
include ('conexion.php');

// Verificar si se ha enviado un formulario con el campo 'epp_edit' no vacío
if (!empty($_POST['epp_edit'])) {
    // Obtener el código del elemento de protección personal (EPP) a editar desde el formulario
    $codigo = $_POST['codigo_editar'];

    // Obtener y sanitizar el nuevo nombre del EPP a través del formulario, convirtiéndolo a mayúsculas y minúsculas
    $newnombre = ucwords(strtolower($_POST['epp_edit']));

    // Verifica si el nuevo nombre ya existe en la base de datos
    $check_query = $con->query("SELECT COUNT(*) as count FROM tblelementosproteccionpersonal WHERE Nombre='$newnombre' AND Codigo != '$codigo'");
    $result = $check_query->fetch_assoc();
    $count = $result['count'];

    if ($count > 0) {
        // Si el nombre ya existe para otro registro, muestra un mensaje de error o toma alguna otra acción apropiada
        header('location:epp.php');
        session_start();
        $_SESSION['status'] = 'en_uso';

    } else {
        // Actualizar el nombre del EPP en la base de datos utilizando el código del EPP
        $upd = $con->query("UPDATE tblelementosproteccionpersonal SET Nombre='$newnombre' WHERE Codigo='$codigo'");

        // Verifica si la consulta de actualización se ejecutó correctamente
        if ($upd) {
            header('location:epp.php');
            session_start();
            $_SESSION['status'] = 'edit_exitoso';
            exit(); // Termina el script después de redirigir para evitar ejecución adicional.
        }
    }
}
?>