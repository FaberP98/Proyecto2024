<?php
session_start();

function cambiarContrasena($actual,$nueva){
    
    include('../conexion.php');
    $id=$_SESSION['id'];
    if($actual===$_SESSION['contrasena']){
        $actualizar=$con->query("UPDATE tblusuario SET Contraseña ='$actual' WHERE DocId='$id';");
        $_SESSION['contrasena']=$nueva;
        $_SESSION['estado']=true;
        header("Location: ../ajustes_generales.php");
        
    }else{
        $_SESSION['estado']=false;
        header("Location: ../ajustes_generales.php");
    }

}

function editarDatos($correo,$nombres,$apellidos){
    include('../conexion.php');
    $id=$_SESSION['id'];
    $actualizar=$con->query("UPDATE tblusuario SET Nombres='$nombres',Apellidos='$apellidos',Correo ='$correo' WHERE DocId='$id';");

    $_SESSION['nombre']=$nombres;
    $_SESSION['apellido']=$apellidos;
    $_SESSION['correo']=$correo;

    $_SESSION['estado']=true;
    header("Location: ../ajustes_generales.php");
        
}




if(isset($_POST['actual_pass'])&&isset($_POST['new_pass'])){
    $contrasena_actual=$_POST['actual_pass'];
    $contrasena_nueva=$_POST['new_pass'];

    cambiarContrasena($contrasena_actual,$contrasena_nueva);
}


if(isset($_POST['correo'])&&isset($_POST['nombres'])&&isset($_POST['apellidos'])){
    $correo=$_POST['correo'];
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    
    editarDatos($correo,$nombres,$apellidos);
}

?>