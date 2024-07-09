<?php
session_start();
if(!isset($_SESSION['id'])){
  header('location:../usuario/login.php');
}else{
?>
<!-- Barra de navegación para el administrador -->

<nav id="navAdmin" class="navbar sticky-top navbar-expand-lg navbar-dark border border-dark border-3 rounded-5">
  <div class="container-fluid mx-2 p-1">
    <a class=" link-underline link-underline-opacity-0" href="inicioAdmin.php">
      <img id="logoAdmin" src="../img/logoAdmin.png" alt="">
      <h3 class="slogan link-dark fw-bold d-inline align-bottom">Gestiona el riesgo</h3>
    </a>
    <button class="navbar-toggler bg-dark " type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" id="navbarNavDropdown" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <a class=" link-underline link-underline-opacity-0" href="inicioAdmin.php">
          <img id="logoAdmin" src="../img/logoAdmin.png" alt="">
          <h3 class="slogan link-dark fw-bold d-inline align-bottom">Gestiona el riesgo</h3>
        </a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1">
          <li class="nav-item m-2">
            <a class="nav-link px-4 active bg-dark rounded-pill" aria-current="page" href="analitica.php"><b>Analítica</b></a>
          </li>
          <li class="nav-item m-2">
            <a class="nav-link px-4 active bg-dark rounded-pill" aria-current="page" href="matriz.php"><b>Matriz</b></a>
          </li>
          <li class="nav-item m-2">
            <a class="nav-link px-4 active bg-dark rounded-pill" aria-current="page" href="registrar_usuario.php"><b>Registrar Usuarios</b></a>
          </li>
          <li class="nav-item dropdown m-2">
              <a class="nav-link px-4 dropdown-toggle active bg-dark rounded-pill" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <b>Editar información</b>
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
               <li><a class="dropdown-item" href="./perfiles.php">Perfiles</a></li>
                <li><a class="dropdown-item" href="./empleados.php">Empleados</a></li>
                <li><a class="dropdown-item" href="cargos.php">Cargos</a></li>
                <li><a class="dropdown-item" href="./procesos.php">Procesos</a></li>
                <li><a class="dropdown-item" href="./actividades.php">Actividades</a></li>
                <li><a class="dropdown-item" href="./tareas.php">Tareas</a></li>
                <li><a class="dropdown-item" href="./zonasLugares.php">Zonas/Lugares</a></li>
                <li><a class="dropdown-item" href="./estados.php">Estados</a></li>
                <li><a class="dropdown-item" href="./clasificacion.php">Clasificación de Peligros</a></li>
                <li><a class="dropdown-item" href="./descripcion.php">Descripción de Peligros</a></li>
                <li><a class="dropdown-item" href="./epp.php">Elementos de Protección Personal</a></li>
                <li><a class="dropdown-item" href="./nivelesconsecuencia.php">Niveles de Consecuencia</a></li>
                <li><a class="dropdown-item" href="./nivelesdeficiencia.php">Niveles de Deficiencia</a></li>
                <li><a class="dropdown-item" href="./nivelesexposicion.php">Niveles de Exposición</a></li>
    
              </ul>
            </li>
          <li class="nav-item dropdown m-2 ">
            <a class="nav-link px-4 active bg-dark rounded-pill d-flex"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="material-icons">
              account_circle 
            </span>
            <div><b class= "dropdown-toggle ms-1"><?php echo $_SESSION['nombre']; ?></b></div>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="ajustes_generales.php">Ajustes</a></li>
              <li><a class="dropdown-item" href="../usuario/cerrarsesion.php">Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
     </div>
    </div>
  </div>
</nav>
<?php
}
?>