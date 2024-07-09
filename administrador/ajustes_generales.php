<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajustes Generales</title>
    <?php include('vistas/custom_header.html'); ?>
</head>
<div></div>
<body>
<?php include('vistas/nav.php'); ?>
<div class="container mt-2">
    <div class="row">
        <div class="col-12 mb-3 text-center">
            <div class="">
                <h1><b>Ajustes generales </b> </h1>
            </div>
        </div>
    </div>
    <div class="row">
        <form class="needs-validation" action="validaciones/validacion_ajustes.php" method="post" novalidate>
            <legend>Información personal:</legend>
            <div class="container-fluid bg-light">
                <fieldset id="info_personal" disabled>
                    <div class="row m-3">
                        <div class="mb-3 col-6  ">
                            <label for="correo" class="form-label fw-semibold">Correo</label>
                            <input type="email" id="correo" name="correo" class="form-control" value="<?php echo $_SESSION['correo'];?>" required>

                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            <div class="invalid-feedback">
                                Este campo es obligatorio.
                            </div>
                        </div>
                        <div class="mb- col-6">
                            <label for="nombres" class="form-label fw-semibold">Nombres</label>
                            <input type="text" id="nombres" name="nombres" class="form-control" value="<?php echo $_SESSION['nombre'];?>" required>

                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            <div class="invalid-feedback">
                                Este campo es obligatorio.
                            </div>
                        </div>
                        <div class="mb- col-6">
                            <label for="apellidos" class="form-label fw-semibold">Apellidos</label>
                            <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?php echo $_SESSION['apellido'];?>" required>

                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            <div class="invalid-feedback">
                                Este campo es obligatorio.
                            </div>
                            </div>
                        <div class="mb- col-6">
                            <label for="doc_id" class="form-label fw-semibold">Documento de identidad</label>
                            <input type="text" id="doc_id" name="doc_id" class="form-control" value="<?php echo $_SESSION['id'];?>" >
                        </div>

                    </div>
                </fieldset>
                <div class="row ">
                    <div class="col m-3 d-flex justify-content-center" >
                        <button type="button" onclicK="habilitarInfo()" class="btn btn-primary" id="btn_editar">Editar Información</button>
                        <button type="submit" class="btn btn-primary  mx-2 d-none" id="btn_guardar">Guardar</button>
                        <button type="button" onclicK="cancelarInfo()" class="btn btn-danger  mx-2 d-none" id="btn_cancelar">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="row mt-2">
        <legend>Seguridad:</legend>
        <div class="col-3 mb-2">
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#campos_contra">Cambie su contraseña</button>
        </div>

        <div class="bg-light collapse col-12" id="campos_contra">
            <form class="needs-validation" action="validaciones/validacion_ajustes.php" method="post" novalidate>
                <div class="row">
                    <div class="my-3 col-6  ">
                        <label for="actual_pass" class="form-label fw-semibold">Contraseña actual</label>
                        <input type="password" name="actual_pass" id="actual_pass" class="form-control" placeholder="Escribe tu contraseña actual" required>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                        <div class="invalid-feedback">
                            Este campo es obligatorio.
                        </div>
                    </div>
                    <div class="my-3 col-6">
                        <label for="new_pass" class="form-label fw-semibold">Nueva contraseña</label>
                        <input type="password" name="new_pass" id="new_pass" class="form-control" placeholder="Escribe tu nueva contraseña" required>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                        <div class="invalid-feedback">
                            Este campo es obligatorio.
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col m-3 d-flex justify-content-center">
                        <button type="button" class="btn btn-danger mx-2" data-bs-toggle="collapse"
                            data-bs-target="#campos_contra" aria-expanded="false" aria-controls="campos_contra">Cancelar</button>
                        <button type="submit" class="btn btn-primary mx-2">Cambiar contraseña</button>
                    </div>
                </div>
               
            </form>
        </div>
        
    </div>

</div>
<script>
    function habilitarInfo(){
  // Habilitar el fieldset con 
  document.getElementById("info_personal").disabled = false;
  document.getElementById("doc_id").disabled = true;
  document.getElementById("btn_editar").style.display="none";
  document.getElementById("btn_guardar").classList.remove("d-none");
  // document.getElementById("btn_guardar").classList.add("d-flex");
  document.getElementById("btn_cancelar").classList.remove("d-none");
  // document.getElementById("btn_cancelar").classList.add("d-flex");

  // Deshabilitar el fieldset 
  // document.getElementById("info_personal").disabled = true;
}
//acciones al dar cancelar en ajustes del administrador
function cancelarInfo(){
  document.getElementById("info_personal").disabled = true;
  document.getElementById("btn_editar").style.display="flex";
  document.getElementById("btn_guardar").classList.add("d-none");
  // document.getElementById("btn_guardar").classList.add("d-flex");
  document.getElementById("btn_cancelar").classList.add("d-none");

}
</script>
<script src="main.js"></script>
 <!-- Implementación de sweet alert 2 para el registro de usuario -->
 <?php 
if(isset($_SESSION['estado'])){
    if($_SESSION['estado']){?>
        <script>
        Swal.fire({
        title: "Correcto!",
        text: "Los cambios se guardaron satisfactoriamente.",
        icon: "success"
        });
        </script>
        <?php
    }else{?>
        <script>
        Swal.fire({
        title: "Error!",
        text: "La contraseña no pudo cambiarse.",
        icon: "error"
        });
        </script>
        <?php

    }
}
unset($_SESSION['estado']);
?>
</body>
</html>