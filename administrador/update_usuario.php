<?php
include ('conexion.php');
// Verifica si se ha enviado un formulario con el campo 'codigo_editar' no vacío
if (!empty($_POST['codigo_editar'])) {
    // Obtiene el código del proceso a editar desde el formulario
    $codigo = $_POST['codigo_editar'];

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $documento=$_POST['documento'];
    $rol=$_POST['perfil'];
    $correo=$_POST['correo'];
    $contrasena=$_POST['contrasena'];

    // Actualiza el nombre del usuario en la base de datos utilizando el código del proceso
    $upd = $con->query("UPDATE tblusuario SET DocId='$documento', Nombres='$nombre',Apellidos='$apellido', Perfil='$rol', Correo='$correo', Contraseña='$contrasena' WHERE DocId='$codigo'");

        // Verifica si la consulta de actualización se ejecutó correctamente
        if ($upd) {
            header('location:registrar_usuario.php');
            session_start();
            $_SESSION['userUpd'] =true;
            exit(); // Termina el script después de redirigir para evitar ejecución adicional.
        }
    }
?>