<?php
include('../conexion.php');

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$documento=$_POST['documento'];
$rol=$_POST['rol'];
$correo=$_POST['correo'];
$contrasena=$_POST['contrasena'];
$confirm_contra=$_POST['contrasena_confirm'];
if($contrasena===$confirm_contra){
    $validar=$con->query("SELECT * FROM tblusuario WHERE DocId='$documento';");
    if(mysqli_num_rows($validar)>0){
        header("Location: ../registrar_usuario.php");
        session_start();
        $_SESSION['estado']=false;
        
    }else{
        $consulta=$con->query("INSERT into tblusuario VALUES('$documento','$nombre','$apellido', '$rol','$correo','$contrasena');"); 
        header("Location: ../registrar_usuario.php");
        session_start();
        $_SESSION['estado']=true;
    }
}else{
    header("Location: ../registrar_usuario.php");
    session_start();
    $_SESSION['estado']=false;
}

?>