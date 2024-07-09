<?php
// Incluir el archivo de conexión a la base de datos
include('conexion.php');

// Verificar si el formulario de creación de proceso ha sido enviado y el campo 'proceso' no está vacío
if(!empty($_POST['proceso'])){
    // Sanitizar y formatear el nombre del proceso, convirtiéndolo a mayúsculas y minúsculas
    $proceso = ucwords(strtolower($_POST['proceso']));
    
    // Consultar si ya existe un proceso con el mismo nombre en la base de datos
    $consulta = $con->query("SELECT * FROM tblproceso WHERE nombre='$proceso'");
    
    // Verificar si se encontraron resultados en la consulta, lo que indica que el proceso ya existe
    if(mysqli_num_rows($consulta) > 0){
       // Si el perfil ya existe, muestra una alerta y redirecciona a la página 'perfiles.php'
       header('location:procesos.php');
       session_start();
       $_SESSION['status'] = 'en_uso';
    } else {
        // Si el proceso no existe, insertarlo en la base de datos
        $insert = $con->query("INSERT INTO tblproceso VALUES(null, '$proceso')");
        header('location:procesos.php');
        session_start();
        $_SESSION['status'] = 'agregado';
    }
}
?>
