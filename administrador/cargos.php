<?php
// AÑADIR NUEVO CARGO

if(!empty($_POST['cargo'])){
    /* PHP strtoupper(): Convierte a mayúsculas los caracteres de una cadena string.
    PHP strtolower(): Convierte a minúsculas los caracteres de una cadena string.
    PHP ucfirst(): Convierte a mayúsculas el primer caracter de una cadena string.
    PHP ucwords(): Convirte a mayúsculas el primer caracter de cada palabra de una cadena o string. */
  $cargo=ucwords(strtolower($_POST['cargo']));
  //verificacion de que no existe
  $consulta=$con->query("SELECT * FROM tblcargo WHERE nombre='$cargo'");
  if(mysqli_num_rows($consulta)>0){
    echo "<script>alert('Cargo ya existente');</script>";

  }else{//si no exite inserto el nuevo cargo
    $insert=$con->query("INSERT INTO tblcargo VALUES(null, '$cargo')");
  }

}
//BORRAR UN CARGO

if(!empty($_GET['del_codigo'])){
  echo '<script>
    alert("se borrará el registro");
    </script>';
  $codigo=$_GET['del_codigo'];
  $del=$con->query("DELETE FROM tblcargo WHERE Codigo='$codigo'");

  header('location:cargos.php');
}

//ACTUCALIZAR UN CARGO

if(!empty($_POST['cargo_edit'])){
  $codigo=$_POST['codigo_editar'];
  $newnombre=ucwords(strtolower($_POST['cargo_edit']));
  $upd=$con->query("UPDATE tblcargo SET Nombre='$newnombre' WHERE Codigo='$codigo'");
  if($upd){header('location:cargos.php');}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<?php 
include('vistas/custom_header.html');
include('vistas/table_header.html');
include('conexion.php');
?>
<title>Cargos</title>

</head>

<body>
  <!-- navegador  -->
  <?php include('vistas/nav.php'); ?>

  <div class="container mt-3">
    <!-- Botón dee agregar nuevo  -->
     <h1>Listado de cargos</h1>
    
    <buttom type="buttom" class="btn btn-dark btn-md p-2 rounded-5" data-bs-toggle="modal" data-bs-target="#modalAddCargo">
      <div class="d-flex align-items-center ">
        <span class="material-icons">add</span>
        <div class=""><b>Añadir Cargo</b></div>
      </div>
    </buttom>

    <!-- Tabla de datos de cargos  -->
    <div class="table-responsive">

      <table id="tblcargo" class="table table-striped ">
          <thead class="table-info ">
            <tr>
              <th>Cargo</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $cargos=$con->query("SELECT * FROM tblcargo");
              foreach ($cargos as $cargo) {?>
                <tr class="" >
                  <td>
                    <?php echo $cargo['Nombre']; ?>
                  </td>
                  <td>
                    <a type="button" data-bs-toggle="modal" data-bs-target="#modalEditar<?php echo $cargo['Codigo'];?>">
                      <span class="material-icons btn btn-outline-primary btn-sm">edit</span>
                    </a>

                    <!-- Modal editar  cargo-->

                    <div class="modal fade" id="modalEditar<?php echo $cargo['Codigo'];?>" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalAddAutor">Editar cargo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="POST">
                              <div class="form mb-3">
                                <label for="cargo_edit" class="fw-bold">Nombre del cargo:</label>
                                <input type="text" class="form-control" name="cargo_edit" value="<?php echo $cargo['Nombre'] ?>" placeholder="Cargo"  required>
                                <input type="hidden" name="codigo_editar" value="<?php echo $cargo['Codigo'] ?>">
                              </div>
                              <div>
                                <button type="submite" class="btn btn-primary">Actualizar</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                              </div>
                            </form>
                          </div>

                          <div class="modal-footer">
                            Se actualizará el cargo en la base de datos.
                          </div>
                        </div>
                      </div>

                    </div>

                    <!-- <a href="cargos.php?upd_codigo=<?php //echo $cargo['Codigo'];?>"><span class="material-icons btn btn-outline-primary btn-sm">upgrade</span></a> -->

                    <a href="cargos.php?del_codigo=<?php echo $cargo['Codigo'];?>"><span class="material-icons btn btn-outline-danger btn-sm">delete</span></a>
                  </td>
                </tr>
                <?php
                }
            ?>
          </tbody>
      </table>
    </div>
    
    <!-- Formulario para editar campo -->
    <!-- <form action="" <?php //if(!isset($_GET['upd_codigo'])){?> hidden <?php //}?> method="POST">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="newcargo" placeholder="Cargo" required>
        <label for="newcargo" class="fw-bold">Nuevo nombre del cargo:</label>
      </div>
      <button type="submit" class="btn btn-primary">Actualizar</button>
      
      <a href="cargos.php" type="button" class="btn btn-danger" >Cancelar</a>
    </form> -->


  </div>

<!-- modal de registrar un nuevo cargo  -->

<div class="modal fade" id="modalAddCargo"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddAutor">Registrar nuevo cargo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="" class="needs-validation" method="POST" novalidate>
          <div class="form-group my-3">
            <label for="cargo" class="fw-medium form-label">Nombre del nuevo cargo:</label>
            <input type="text" class="form-control" name="cargo" required>
            <div class="valid-feedback">
              Correcto!
            </div>
            <div class="invalid-feedback">
              Por favor complete este campo.
            </div>

          </div>
          <button type="submite" class="btn btn-primary">Agregar</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        </form>
      </div>

      <div class="modal-footer">
        Se añadirá el nuevo cargo a la base de datos.
      </div>
    </div>
  </div>

</div>



<?php include('vistas/table_script.html');?>
</body>
</html>