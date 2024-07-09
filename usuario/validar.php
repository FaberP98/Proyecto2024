<?php 
// Inicia la sesión para mantener el estado de inicio de sesión del usuario
session_start();

// Incluye el archivo de conexión a la base de datos
include('conexion.php');

// Obtiene el correo electrónico y la contraseña enviados desde el formulario de inicio de sesión
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Realiza una consulta para validar el inicio de sesión basado en el correo electrónico y la contraseña
$validar_login = $con->query("SELECT * FROM tblusuario where Correo='$correo' and Contraseña='$contrasena'");

// Obtiene la fila de resultados de la consulta
$filas = mysqli_fetch_array($validar_login);

// Verifica el perfil del usuario para redirigirlo a la página correspondiente
if($filas['Perfil'] == 1) { // Usuario normal
    // Almacena el correo electrónico como identificación de sesión
    $_SESSION['docid'] = $correo;
    $_SESSION['nombre'] = $filas['Nombres']; // Guardar el nombre en la sesión
    // Redirige al usuario a la página de bienvenida
    header("location: bienvenido.php");
} else if($filas['Perfil'] == 2) { // Administrador
    // Almacena el correo electrónico y otras variables de sesión para el administrador
    $_SESSION['docid'] = $correo;
    $_SESSION['correo'] = $filas['Correo'];
    $_SESSION['nombre'] = $filas['Nombres'];
    $_SESSION['apellido'] = $filas['Apellidos'];   
    $_SESSION['id'] = $filas['DocId'];
    $_SESSION['contrasena'] = $filas['Contraseña'];

    // Redirige al administrador a la página de inicio de administrador
    header("location: ../administrador/inicioAdmin.php");
} else {
    // Si el usuario no existe en la base de datos, muestra un mensaje de alerta y redirige de vuelta a la página de inicio de sesión
    header('location:login.php');
        session_start();
        $_SESSION['status'] = 'error';
    // Finaliza el script para evitar que se ejecute el resto del código
    exit;
}
?>
