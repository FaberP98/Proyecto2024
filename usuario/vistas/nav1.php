<?php 
$nombre_usuario = isset($_SESSION['nombre']) ? explode(" ", $_SESSION['nombre'])[0] : "Usuario";
// isset($_SESSION['nombre']):Verifica si la variable de sesión 'nombre' está definida.
// Operador ternario ? :Es una forma abreviada de escribir una declaración if-else.
// explode(" ", $_SESSION['nombre']) divide el nombre completo en un array, usando el espacio como separador.
// [0] toma el primer elemento de este array, que sería el primer nombre.
// Si $_SESSION['nombre'] no está definido: Se asigna el valor "Usuario".
// Usamos explode(" ", $_SESSION['nombre'])[0] para obtener solo el primer nombre en caso de que haya nombres compuestos.
?>

<nav class="navbar sticky-top navbar-expand-lg bg-white m-2 rounded-pill">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="./bienvenido.php">
            <img id="logo" src="./img/logouser.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
            <h3 class="fw-bold ms-3 mt-2">Gestiona el riesgo</h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a class="navbar-brand d-flex align-items-center fw-bold" href="./bienvenido.php">
                    <img src="./img/logouser.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top me-3">
                    Gestiona el riesgo
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item m-2">
                        <a class="nav-link px-4 active bg-secondary text-white rounded-pill" aria-current="page" href="./index_editado.php">Reporte de peligros</a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link px-4 active bg-secondary text-white rounded-pill" aria-current="page" href="./matriz.php">Matriz</a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link px-4 active bg-secondary text-white rounded-pill" aria-current="page" href="#">Analítica</a>
                    </li>
                    <li class="nav-item m-2 dropdown">
                        <a class="nav-link px-4 active bg-secondary text-white rounded-pill d-flex" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="material-icons">
                                account_circle
                            </span>
                            <!-- htmlspecialchars() es una función de PHP que se utiliza para convertir caracteres especiales en entidades HTML -->
                            <div><b class="dropdown-toggle fw-normal ms-1"><?php echo htmlspecialchars($nombre_usuario); ?></b></div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark rounded-pill mt-2" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item rounded-pill" href="cerrarsesion.php">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>