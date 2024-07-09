<?php
// Incluir el archivo de conexión a la base de datos
include('conexion.php');

// Verificar si el formulario de creación de clasificación ha sido enviado y el campo 'clasificacion' no está vacío
if(!empty($_POST['clasificacion'])){
    // Sanitizar y formatear el nombre de la clasificación, convirtiéndolo a mayúsculas y minúsculas
    $clasificacion = ucwords(strtolower($_POST['clasificacion']));
    
    // Consultar si ya existe una clasificación con el mismo nombre en la base de datos
    $consulta = $con->query("SELECT * FROM tblclasificacionpeligro WHERE nombre='$clasificacion'");
    
    // Verificar si se encontraron resultados en la consulta, lo que indica que la clasificación ya existe
    if(mysqli_num_rows($consulta) > 0){
        // Si la clasificación ya existe, mostrar una alerta
        header('location:clasificacion.php');
        session_start();
        $_SESSION['status'] = 'en_uso';
    } else {
        // Si la clasificación no existe, insertarla en la base de datos
        $insert = $con->query("INSERT INTO tblclasificacionpeligro VALUES(null, '$clasificacion')");
        header('location:clasificacion.php');
        session_start();
        $_SESSION['status'] = 'agregada';
    }
}
?>
