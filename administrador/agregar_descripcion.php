<?php
include ('conexion.php');

if (!empty($_POST['Nombre']) && !empty($_POST['Clasificacion'])) {
    $Nombre = ucwords(strtolower($_POST['Nombre']));
    $Clasificacion = $_POST['Clasificacion'];

    $consulta = $con->query("SELECT * FROM tbldescripcionpeligro WHERE nombre='$Nombre'");
    // Verifica si se encontraron resultados en la consulta, lo que indica que el perfil ya existe
    if (mysqli_num_rows($consulta) > 0) {
        // Si el perfil ya existe, muestra una alerta y redirecciona a la página 'perfiles.php'
        header('location:descripcion.php');
        session_start();
        $_SESSION['status'] = 'en_uso';
    } else {
        $insertar = $con->query("INSERT INTO tbldescripcionpeligro(Nombre, Clasificacion) VALUES ('$Nombre','$Clasificacion')");
        header('location:descripcion.php');
        session_start();
        $_SESSION['status'] = 'agregada';
    }
}
?>