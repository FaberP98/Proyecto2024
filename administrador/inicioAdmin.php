<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <?php include('vistas/custom_header.html'); ?>
</head>
<body class="bodyAdmin">
<?php include('vistas/nav.php'); ?>
<div class="container-fluid">
    <div class="row justify-content-center bg-light">
        <div class="col-12 text-center">
            <h1><b>¡Bienvenido Nuevamente! </b> </h1>
        </div>
        <div class="col-md-5 d-none d-md-block text-end ms-5 my-auto ">
            <h2><b>Has iniciado sesión como administrador</b></h2>
        </div>
        <div class="col-md-5">
            <img src="../img/imgAdmin1.PNG" alt="" class="rounded float-end">

        </div>
    </div>
    <div class="row justify-content-center m-3 p-3">
        <div class="col-md-5 mx-3 my-auto bg-light p-5 border border-dark border-3 rounded-pill ">
            <div class="text-center">
                <span class="material-icons mb-3 btn btn-dark">bar_chart</span>
            </div>
            <p class="fw-bold">1. Ver estadisticas y gráficos de los diferentes peligros, además tendrás la
                 posibilidad de filtrarlos, ya sea por zona mayor o menor relevancia.
            </p>
        </div>
        <div class="col-md-4 d-none d-md-block bg-light text-center rounded-pill">
            <img src="../img/imgAdmin2.PNG" alt="" class="img-fluid rounded-circle">
        </div>
        
        <div class="col-md-4 d-none d-md-block text-center bg-light rounded-pill">
            <img src="../img/imgAdmin3.PNG" alt="" class="img-fluid rounded-circle">
        </div>
        <div class="col-md-5 mx-3 my-auto bg-light p-5 border border-dark border-3 rounded-pill">
            <div class="text-center">
                <span class="material-icons mb-3 btn btn-dark">edit_square</span>
            </div>
            <p class="fw-bold">2. Editar, agregar y eliminar: tareas, procesos, cargos,
                 elementos de proección personal, zonas o lugares. </p>
        </div>
        <div class="col-md-5 mx-3 my-auto bg-light p-5 border border-dark border-3 rounded-pill">
            <div class="text-center">
                <span class="material-icons mb-3 btn btn-dark">assignment_turned_in</span>
            </div>
            <p class="fw-bold">3. Permitir el acceso a nuevos usuarios.</p>
        </div>
        <div class="col-md-4 d-none d-md-block text-center bg-light rounded-pill">
            <img src="../img/imgAdmin4.PNG" alt="" class="img-fluid rounded-circle">
        </div>       
    </div>
</div>

<script src="main.js"></script> 
</body>
</html>