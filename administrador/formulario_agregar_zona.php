<?php
// Incluir el archivo de conexión a la base de datos
include('conexion.php');

// Verificar si el formulario de creación de zona/lugar ha sido enviado y el campo 'zona' no está vacío
if(!empty($_POST['zona'])){
    // Sanitizar y formatear el nombre de la zona/lugar, convirtiéndolo a mayúsculas y minúsculas
    $zona = ucwords(strtolower($_POST['zona']));
    
    // Consultar si ya existe una zona/lugar con el mismo nombre en la base de datos
    $consulta = $con->query("SELECT * FROM tblzonalugar WHERE nombre='$zona'");
    
    // Verificar si se encontraron resultados en la consulta, lo que indica que la zona/lugar ya existe
    if(mysqli_num_rows($consulta) > 0){
        // Si la zona/lugar ya existe, mostrar una alerta
        header('location:zonaslugares.php');
        session_start();
        $_SESSION['status'] = 'en_uso';
    } else {
        // Si la zona/lugar no existe, insertarlo en la base de datos
        $insert = $con->query("INSERT INTO tblzonalugar VALUES(null, '$zona')");
        header('location:zonaslugares.php');
        session_start();
        $_SESSION['status'] = 'agregada';
    }
}
?>
