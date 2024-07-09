<nav class="navbar navbar-expand-lg bg-white m-2 rounded-pill">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="./inicio.php">
            <img id="logo" src="./img/logouser.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
            <h3 class="fw-bold ms-3 mt-2">Gestiona el riesgo</h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a class="navbar-brand d-flex align-items-center fw-bold" href="./inicio.php">
                    <img src="./img/logouser.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top me-3">
                    Gestiona el riesgo
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item m-2">
                        <a class="nav-link px-4 active bg-secondary text-white rounded-pill" aria-current="page" href="inicio.php">Inicio</a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link px-4 active bg-secondary text-white rounded-pill" aria-current="page" href="login.php">Iniciar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>