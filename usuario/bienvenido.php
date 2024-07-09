<?php

// Inicia la sesión
session_start();

// Verifica si la variable de sesión 'docid' no está establecida
if (!isset($_SESSION['docid'])) {
    // Si no está establecida, muestra una alerta y redirige a la página de inicio de sesión
    // Destruye la sesión
    session_destroy();
    session_start();
    header('location:login.php');
    $_SESSION['status'] = 'inicio';
    // Termina la ejecución del script
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <?php include('vistas/script.php'); ?>
</head>

<body class="overflow-auto vh-100" style="
    background: rgb(116, 231, 245);
    background: -moz-linear-gradient(203deg, rgba(116, 231, 245, 1) 0%, rgba(230, 230, 230, 1) 100%);
    background: -webkit-linear-gradient(203deg, rgba(116, 231, 245, 1) 0%, rgba(230, 230, 230, 1) 100%);
    background: linear-gradient(203deg, rgba(116, 231, 245, 1) 0%, rgba(230, 230, 230, 1) 100%);
    background-repeat: no-repeat; /* Evita que se repita el fondo */
    background-attachment: fixed; /* Fija el fondo en su posición */">

    <?php include('config/validacion.php'); ?>

    <?php include('vistas/nav1.php'); ?>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1><b>¡Bienvenido! </b> </h1>
            </div>
            <div class="col-5 text-center ms-5 my-auto ">
                <h3><b class="">A continuación tendrás acceso a diferentes acciones relacionadas con
                        la gestión de los peligros en la empresa</b></h3>
            </div>
        </div>
        <div class="row justify-content-center m-3 p-3">
            <div class="col-5 mx-3 my-auto bg-light p-5 border border-dark border-3 rounded-5">
                <div class="text-center">
                    <img src="img/unknown_document_24dp_FILL0_wght400_GRAD0_opsz24 (1).svg" class="mb-3 btn btn-dark" alt="into">
                </div>
                <p class="fs-5 fw-normal"><a class="link-dark text-dark fw-bold" href="index_editado.php">Reporte de peligros:</a> Aquí podrás
                reportar toda la información relativa a los peligros y riesgos, para
                lo cual debes contar con la información que se solicita
                en la Guía Técnica Colombiana 45 (GTC-45).</p>
            </div>
            <div class="col-4 bg-light text-center rounded-5">
                <img src="img/imguser1.png" alt="" class="img-fluid rounded-5">
            </div>

            <div class="col-4 text-center bg-light rounded-5">
                <img src="img/imguser2.png" alt="" class="img-fluid rounded-5">
            </div>
            <div class="col-5 mx-3 my-auto bg-light p-5 border border-dark border-3 rounded-5">
                <div class="text-center">
                    <img src="img/engineering_24dp_FILL0_wght400_GRAD0_opsz24.svg" class="mb-3 btn btn-dark" alt="matriz">
                </div>
                <p class="fs-5 fw-normal"><a class="link-dark text-dark fw-bold" href="matriz.php">Matriz:</a> Aquí podrás observar la matriz de peligros diligenciada.</p>
            </div>
            <div class="col-5 mx-3 my-auto bg-light p-5 border border-dark border-3 rounded-5">
                <div class="text-center">
                    <img src="img/monitoring_24dp_FILL0_wght400_GRAD0_opsz24.svg" class="mb-3 btn btn-dark" alt="analitica">
                </div>
                <p class="fs-5 fw-normal"><a class="link-dark text-dark fw-bold" href="estadisticas">Analítica:</a> Aquí podrás visualizar las estadísticas y
                gráficos según tu elección.</p>
            </div>
            <div class="col-4 text-center bg-light rounded-5">
                <img src="img/imguser3.png" alt="" class="img-fluid rounded-5">
            </div>
        </div>
    </div>
</body>

</html>