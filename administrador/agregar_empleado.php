<?php
include('conexion.php');

if (!empty($_POST['DocId']) && !empty($_POST['Nombres']) && !empty($_POST['Apellidos']) && isset($_POST['Correo']) && !empty($_POST['Celular']) && !empty($_POST['Cargo']) ) {
    $DocId = $_POST['DocId'];
    $Nombres= ucwords(strtolower($_POST['Nombres']));
    $Apellidos= ucwords(strtolower($_POST['Apellidos']));
    $Correo = $_POST['Correo'];
    $Celular = $_POST['Celular'];
    $Cargo = $_POST['Cargo'];

    $consulta = $con->query("SELECT * FROM tblempleado WHERE Nombres='$Nombres' AND Apellidos ='$Apellidos'");

    // Verifica si se encontraron resultados en la consulta, lo que indica que el perfil ya existe
    if (mysqli_num_rows($consulta) > 0) {
        // Si el perfil ya existe, muestra una alerta y redirecciona a la página 'perfiles.php'
        header('location:empleados.php');
        session_start();
        $_SESSION['status'] = 'en_uso';
    } else {
        $insertar = $con->query("INSERT INTO tblempleado(DocId,Nombres,Apellidos,Cargo,Correo,Celular) VALUES ('$DocId','$Nombres','$Apellidos','$Cargo',
        '$Correo','$Celular')");
        header('location:empleados.php');
        session_start();
        $_SESSION['status'] = 'agregado';
    }
}
?>
