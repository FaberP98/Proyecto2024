<?php
// Incluir el archivo de conexión a la base de datos
include('../conexion.php');

// Obtener el ID del usuario y las contraseñas del formulario enviado
$userId = $_POST['id'];
$nuevaContrasena = $_POST['nueva_contrasena'];
$confirmarContrasena = $_POST['confirmar_contrasena'];

// Verificar si las contraseñas coinciden
if ($nuevaContrasena !== $confirmarContrasena) {
    header('location:../change_password.php');
        session_start();
        $_SESSION['status'] = 'mal';
    exit; // Detener la ejecución del script si las contraseñas no coinciden
}

// Preparar y ejecutar la consulta para actualizar la contraseña en la base de datos
$stmt = $con->prepare("UPDATE tblusuario SET Contraseña = ? WHERE DocId = ?");
$stmt->bind_param("ss", $nuevaContrasena, $userId);

// Verificar si la consulta se ejecutó con éxito
if ($stmt->execute()) {
    // Redirigir a la página de login con un mensaje de éxito
    header('location:../login.php');
        session_start();
        $_SESSION['status'] = 'bien';
} else {
    // Si hubo un error durante la ejecución de la consulta, mostrar un mensaje de error junto con detalles del error
    header('location:../login.php');
        session_start();
        $_SESSION['status'] = 'error-envio';
    // echo "Error al actualizar la contraseña: " . $stmt->error;
}

// Cerrar la consulta y la conexión a la base de datos
$stmt->close();
$con->close();
?>