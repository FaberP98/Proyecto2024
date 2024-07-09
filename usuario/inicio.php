<?php
// Incluye el archivo de conexión a la base de datos
include('conexion.php');

// Realiza una consulta a la tabla tblperfil y almacena el resultado en la variable $perfil
$perfil = $con->query("SELECT * from tblperfil");

// Inicia la sesión para poder manejar variables de sesión
session_start();

// Verifica si la variable de sesión 'docid' está establecida
// Si está establecida, redirige al usuario a la página bienvenido.php
if (isset($_SESSION["docid"])) {
    header("location: bienvenido.php");
    exit(); // Asegura que el script se detiene después de redirigir
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Incluye el archivo de scripts externos -->
    <?php include('vistas/script.php'); ?>
</head>

<body class="vh-100 overflow-x-hidden" style="background-image: url(img/iniciouser.jpg); background-size:cover; background-repeat: no-repeat;
            background-attachment: fixed;">

    <!-- Incluye el archivo de navegación -->
    <?php include('vistas/nav.php'); ?>

    <div class="container-fluid m-5 ">
        <div class="row my-auto mx-3 justify-content-end text-white position-absolute top-50 end-0 translate-middle-y">
            <div class="col-10 text-center">
                <h1 class="display-3 mb-3 fw-medium"><b>¡Bienvenido!</b></h1>
                <h2 class="fs-2 mb-4"><b>Soy tu gestor de riesgos laborales</b></h2>
                <p class="fs-4 mb-5 fw-semibold">Es importante que tenga disponible la información que el sistema solicita.</p>
            </div>
        </div>

        <div class="row mx-2 my-auto justify-content-end text-center position-absolute bottom-0 end-0">
            <div class="col-4 mx-2 text-bg-secondary">
                <h3>Nosotros</h3>
                <p class="card-text mt-3">Somos aprendices de la tecnología análisis y  desarrollo de software. Centro de innovación en la agroindustria y la aviación-Rionegro.</p>
            </div>
            <div class="col-4 mx-2 text-bg-dark">
                <h3>Contáctanos</h3>
                <p class="card-text mt-3">Si deseas consultar más información sobre <br>nuestros servicios o tienes alguna duda, comentario o sugerencia, puedes contactarnos y nos comunicaremos contigo lo antes posible.<br>
                    Email: gestionaelriesgo@xxx.com<br>
                    Celular: 300 000 00 00
                </p>
            </div>
        </div>
    </div>
</body>

</html>