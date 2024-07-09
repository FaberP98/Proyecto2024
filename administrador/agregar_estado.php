<?php
// Incluir el archivo de conexión a la base de datos
include('conexion.php');

// Verificar si se ha enviado un formulario con el campo 'estado' no vacío
if(!empty($_POST['estado'])){
    // Sanitizar y formatear el nombre del estado, convirtiéndolo a mayúsculas y minúsculas
    $estado = ucwords(strtolower($_POST['estado']));
    
    // Consultar si ya existe un estado con el mismo nombre en la base de datos
    $consulta = $con->query("SELECT * FROM tblestado WHERE nombre='$estado'");
    
    // Verificar si se encontraron resultados en la consulta, lo que indica que el estado ya existe
    if(mysqli_num_rows($consulta) > 0){
        // Si el estado ya existe, mostrar una alerta
        header('location:estados.php');
        session_start();
        $_SESSION['status'] = 'en_uso';
    } else {
        // Si el estado no existe, insertarlo en la base de datos
        $insert = $con->query("INSERT INTO tblestado VALUES(null, '$estado')");
        header('location:estados.php');
        session_start();
        $_SESSION['status'] = 'agregado';
    }
}
?>

