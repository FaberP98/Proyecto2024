<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php 

include('vistas/custom_header.html');
include('vistas/table_header.html');?>
  
  <title>Registrar Usuarios</title>
</head>
<body>
  <!-- navegador  -->
  <?php
  include('vistas/nav.php'); 
  include('conexion.php');
  ?>

  <div class="container mt-3">
    <div class="row mt-2">
      
      <form class="row g-3 needs-validation collapse" id="form_usuario" action="validaciones/validar_usuario.php" method="POST"  novalidate>
        <div class="col-md-6">
            <label for="nombre" class="form-label">
              <span class="material-symbols-outlined align-bottom">
              id_card
              </span> Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
            <div class="valid-feedback">
                Correcto!
            </div>
            <div class="invalid-feedback">
                Por favor complete este campo.
            </div>
        </div>
        <div class="col-md-6">
            <label for="apellido" class="form-label">
              <span class="material-symbols-outlined align-bottom">
              id_card
              </span> Apellido: </label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
            <div class="valid-feedback">
                Correcto!
            </div>
            <div class="invalid-feedback">
                Por favor complete este campo.
            </div>
        </div>
        <div class="col-md-6">
            <label for="doc_id" class="form-label">
              <span class="material-symbols-outlined align-bottom">
              id_card
              </span> Documento: </label>
            <input type="number" class="form-control" name="documento" id="doc_id"  max="9999999999" required>
            <div class="valid-feedback">
                Correcto!
            </div>
            <div class="invalid-feedback">
                Por favor complete este campo.
            </div>
        </div>
        <div class="col-md-6">
            <label for="perfil" class="form-label">
              <span class="material-symbols-outlined align-bottom">
              id_card
              </span> Rol: </label>
            <select class="form-select" id="perfil" name="rol" required>
                <option selected disabled value="">Elige...</option>
                <?php
                $roles=$con->query("SELECT * FROM tblperfil");
                foreach ($roles as $rol) {?>
                    <option value=<?php echo $rol['Codigo']?>><?php echo $rol['Nombre'];?></option>
                <?php
                }
                ?>
            </select>
            <div class="valid-feedback">
                Correcto!
            </div>
            <div class="invalid-feedback">
              Por favor elija una opción
            </div>
        </div>
        <div class="col-md-6">
            <label for="correo" class="form-label">
            <span class="material-symbols-outlined align-bottom">
              mail 
            </span> Correo: </label>
            <input type="email" class="form-control" name="correo" id="correo" required>
            <div class="valid-feedback">
                Correcto!
            </div>
            <div class="invalid-feedback">
                Por favor complete este campo.
            </div>
        </div>
        <div class="col-md-6 ">
          <div class="row">

            <div class="col-md-6">
  
              <label for="contrasena" class="form-label">
                <span class="material-symbols-outlined  align-bottom">
                lock  
                </span> Contraseña: 
              </label>
              <input type="password" class="form-control" name="contrasena" id="contrasena" required>
              <div class="valid-feedback">
                  Correcto!
              </div>
              <div class="invalid-feedback">
                  Por favor complete este campo.
              </div>
            </div>
            <div class="col-md-6">
  
              <label for="contrasena_confirm" class="form-label">
                <span class="material-symbols-outlined  align-bottom">
                lock  
                </span> Confirmar contraseña: 
              </label>
              <input type="password" class="form-control" name="contrasena_confirm" id="contrasena_confirm" required>
              <div class="valid-feedback">
                  Correcto!
              </div>
              <div class="invalid-feedback">
                  Tu contraseña no es la que ingresaste.
              </div>
            </div>
          </div>
           
        </div>
        
        <div class="col-12 text-center">
        <button type="button" class="btn btn-danger mx-2" data-bs-toggle="collapse"
          data-bs-target="#form_usuario" aria-expanded="false" aria-controls="form_usuario">Cancelar</button>
        <button class="btn btn-primary " type="submit">Registrar</button>
        </div>

      </form>
        
    </div>
    <!-- Implementación de sweet alert 2 para el registro de usuario -->
    <?php 
    if(isset($_SESSION['userUpd'])){
      if($_SESSION['userUpd']){?>
      <script>
        Swal.fire({
            icon: 'success',
            title:'¡Actualización Exitosa!',
            text: 'Los datos han sido actualizados correctamente.'
        });
      </script>

      <?php
    }
  }
    unset($_SESSION['userUpd']);

    if(isset($_SESSION['del'])){
      if($_SESSION['del']){?>
      <script>
        Swal.fire({
            icon: 'success',
            title:'¡Actualización Exitosa!',
            text: 'Los datos han sido borrados correctamente.'
        });
      </script>

      <?php
      }else{?>
      <script>
          Swal.fire({
          title: "Error!",
          text: "El usuario no pudo ser borrado de la base de datos.",
          icon: "error"
        });
        </script>
    <?php
    }
  }
    unset($_SESSION['del']);
   
    if(isset($_SESSION['estado'])){
      if($_SESSION['estado']){?>
        <script>
          Swal.fire({
          title: "Correcto!",
          text: "Usuario registrado satisfactoriamente.",
          icon: "success"
        });
        </script>
        <?php
      }else{?>
        <script>
          Swal.fire({
          title: "Error!",
          text: "El usuario ya existe o los datos son incorrectos.",
          icon: "error"
        });
        </script>
        <?php

      }
    }
    unset($_SESSION['estado']);
    ?>
    <div class="table-responsive">
        <h1>Tabla de Usuarios</h1>
        <div class="col-3 mb-4">
          <button class="d-flex btn btn-dark btn-md p-2 rounded-5 align-items-center fw-medium"type="button" data-bs-toggle="collapse" data-bs-target="#form_usuario"> 
            <span class="material-icons">
              person_add
            </span><b>| Registrar Usuario</b>
          </button>
        </div>

      <table id="tblusuario" class="table table-striped ">
          <thead class="table-info ">
            <tr>
              <th>Documento</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Rol</th>
              <th>Correo</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $usuarios=$con->query("SELECT 
                us.docId as 'DocId',
                us.nombres as 'Nombres',
                us. apellidos as 'Apellidos',
                pe.codigo as 'CodPerfil',
                pe.nombre as 'Perfil',
                us.correo as 'Correo'
                FROM tblusuario AS us INNER JOIN tblperfil AS pe ON 
                pe.codigo=us.perfil");
                
              foreach ($usuarios as $usuario) {?>
                <tr class="" >
                  <td>
                    <?php echo $usuario['DocId']; ?>
                  </td>
                  <td>
                    <?php echo $usuario['Nombres']; ?>
                  </td>
                  <td>
                    <?php echo $usuario['Apellidos']; ?>
                  </td>
                  <td>
                    <?php echo $usuario['Perfil']; ?>
                  </td>
                  <td>
                    <?php echo $usuario['Correo']; ?>
                  </td>
                  <td>
                    <a type="button" data-bs-toggle="modal" data-bs-target="#modalEditar<?php echo $usuario['DocId'];?>">
                      <span class="material-icons btn btn-outline-primary btn-sm">edit</span>
                    </a>
                    <a onclick=borrar() ><span class="material-icons btn btn-outline-danger btn-sm">delete</span></a>
                    <!-- Modal editar  usuario-->

                    <div class="modal fade" id="modalEditar<?php echo $usuario['DocId'];?>" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalAddAutor">Editar usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="update_usuario.php" class="needs-validation" method="POST" novalidate>
                              <div class="mb-3">
                                <label for="nombre" class="fw-bold">Nombre:</label>
                                <input type="text" class="form-control" name="nombre" value="<?php echo $usuario['Nombres'] ?>" placeholder="Nombre"  required>
                                <input type="hidden" name="codigo_editar" value="<?php echo $usuario['DocId'] ?>">
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                <div class="invalid-feedback">
                                  Por favor elija una opción
                                </div>
                              </div>
                              <div>
                              <div class="mb-3">
                                <label for="apellido" class="fw-bold">Apellido:</label>
                                <input type="text" class="form-control" name="apellido" value="<?php echo $usuario['Apellidos'] ?>" placeholder="Apellido"  required>
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                <div class="invalid-feedback">
                                  Por favor elija una opción
                                </div>
                              </div>
                              <div>
                              <div class="mb-3">
                                <label for="documento" class="fw-bold">Documento:</label>
                                <input type="number" class="form-control" name="documento" value="<?php echo $usuario['DocId'] ?>" placeholder="Documento" required>
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                <div class="invalid-feedback">
                                  Por favor elija una opción
                                </div>
                              </div>
                              <div class="mb-3">
                                <label for="perfil" class="form-label fw-bold">Rol: </label>
                                <select class="form-select" id="perfil" name="perfil" required>
                                    <option selected value="<?php echo $usuario['CodPerfil'] ?>"><?php echo $usuario['Perfil'] ?></option>
                                    <?php
                                    $roles=$con->query("SELECT * FROM tblperfil");
                                    foreach ($roles as $rol) {?>
                                        <option value=<?php echo $rol['Codigo']?>><?php echo $rol['Nombre'];?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                <div class="invalid-feedback">
                                  Por favor elija una opción
                                </div>
                                </div>
                              <div>
                              <div class="mb-3">
                                <label for="correo" class="fw-bold">Correo:</label>
                                <input type="email" class="form-control" name="correo" value="<?php echo $usuario['Correo'] ?>" placeholder="Correo"  required>
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                <div class="invalid-feedback">
                                  Por favor elija una opción
                                </div>
                              </div>
                              <div class="mb-3">
                                <label for="contrasena" class="fw-bold">Contraseña:</label>
                                <input type="password" class="form-control" name="contrasena" value="" required>
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                <div class="invalid-feedback">
                                  Por favor elija una opción
                                </div>
                              </div>
                              <div>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            Se actualizará el usuario en la base de datos.
                          </div>

                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php
                }
            ?>
          </tbody>
      </table>
    </div>
  </div>
  
<script>
  function borrar(){
    Swal.fire({
    title: "¿Está seguro?",
    text: "Se borrará el registro y no podrá revertir esta acción",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText:'<a class="text-decoration-none text-light" href="borrar_usuario.php?del_codigo=<?php echo $usuario['DocId'];?>"">Sí, borrar!</a>'
  
  });
    
  }
</script>
<?php
include('vistas/table_script.html');
?>
</body>
</html>