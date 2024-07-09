<?php
// Incluir el archivo de conexión a la base de datos
include('conexion.php');

// Verificar si el formulario de creación de elemento de protección personal (EPP) ha sido enviado y el campo 'epp' no está vacío
if(!empty($_POST['epp'])){
    // Sanitizar y formatear el nombre del EPP, convirtiéndolo a mayúsculas y minúsculas
    $epp = ucwords(strtolower($_POST['epp']));
    
    // Consultar si ya existe un EPP con el mismo nombre en la base de datos
    $consulta = $con->query("SELECT * FROM tblelementosproteccionpersonal WHERE nombre='$epp'");
    
    // Verificar si se encontraron resultados en la consulta, lo que indica que el EPP ya existe
    if(mysqli_num_rows($consulta) > 0){
        // Si el EPP ya existe, mostrar una alerta
        header('location:epp.php');
        session_start();
        $_SESSION['status'] = 'en_uso';
    } else {
        // Si el EPP no existe, insertarlo en la base de datos
        $insert = $con->query("INSERT INTO tblelementosproteccionpersonal VALUES(null, '$epp')");
        header('location:epp.php');
        session_start();
        $_SESSION['status'] = 'agregado';
    }
}
?>
