<?php
$pagina = 'proceso';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./css/style_admin.css">
    <?php
    // Incluye archivos PHP y establece la conexión a la base de datos
    include ('vistas\custom_header.html');
    include ('vistas\nav.php');
    include ('conexion.php');
    include ('vistas/table_header.html');
    ?>
</head>

<body>
    <?php
        include ('validaciones/validaciones.php')
    ?>

    <div class="container-fluid">
        <h1>Lista de procesos</h1>
    </div>

    <br>


    <div class="modal fade" id="modalAddProceso" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bodyAdmin">
                    <h5 class="modal-title" id="modalAddAutor">Registrar un nuevo proceso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="formulario_agregar_proceso.php" class="needs-validation" method="POST" novalidate>
                        <div class="form-group mb-3">
                            <label for="proceso" class="fw-medium form-label">Nombre del nuevo proceso:</label>
                            <input type="text" class="form-control form-control-sm" id="proceso" name="proceso" placeholder="Nombre del proceso" required>
                            <div class="valid-feedback">
                                ¡Perfecto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, ingrese el nombre del nuevo proceso.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </form>

                </div>

                <div class="modal-footer">
                    Se añadirá el nuevo proceso a la base de datos.
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <buttom type="buttom" class="btn btn-dark btn-md mb-4  p-2 rounded-5 " data-bs-toggle="modal"
            data-bs-target="#modalAddProceso">
            <div class="d-flex align-items-center ">
                <span class="material-icons">add</span>
                <div class=""><b>Añadir procesos</b></div>
            </div>
        </buttom>
        
        <table id="tbl_id" class="table table-bordered table-striped"">
            <thead class=" table-primary align-middle text-center">
            <tr>
                <th>Numero</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody class="table-striped table-hover">
                <?php
                // Consulta SQL para obtener las tareas
                // Consulta SQL para obtener las actividades
                
                $procesos = $con->query("SELECT * FROM tblproceso");

                // Iterar sobre las tareas y mostrarlas en la tabla
                foreach ($procesos as $proceso) {
                    ?>
                    <tr class="">
                        <td>
                            <?php echo $proceso['Codigo']; ?>
                        </td>
                        <td>
                            <?php echo $proceso['Nombre']; ?>
                        </td>
                        <td class="d-flex justify-content-center gap-2">

                            <!-- Primer botón -->

                            <a type="button" data-bs-toggle="modal"
                                data-bs-target="#editarModal<?php echo $proceso['Codigo']; ?>">
                                <span class="material-icons btn btn-outline-primary btn-sm">edit</span>
                            </a>


                            <div class="modal fade" id="editarModal<?php echo $proceso['Codigo']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bodyAdmin">
                                            <h5 class="modal-title" id="modalAddAutor">Editar proceso</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="update_proceso.php" class="needs-validation" method="POST"
                                                novalidate>
                                                <div class="form mb-3">
                                                    <label for="proceso_edit" class="fw-medium form-label">Nombre del proceso:</label>
                                                    <input type="text" class="form-control form-control-sm" id="proceso_edit"
                                                        name="proceso_edit" value="<?php echo $proceso['Nombre'] ?>"
                                                        placeholder="Nombre del proceso" required>
                                                    <div class="invalid-feedback">
                                                        Por favor, ingrese el nuevo nombre del proceso.
                                                    </div>
                                                    <input type="hidden" name="codigo_editar"
                                                        value="<?php echo $proceso['Codigo'] ?>">
                                                </div>
                                                <div class="gap-2">
                                                    <button type="submite" class="btn btn-primary">Actualizar</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="modal-footer">
                                            Se actualizará el proceso en la base de datos.
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <a type="button" onclick="return confirmarEliminarProceso(<?php echo $proceso['Codigo']; ?>);">
                                <span class="material-icons btn btn-outline-danger btn-sm">delete</span>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="ventana.js"></script>

    <?php
    include ('vistas/table_script.html');
    ?>


</body>

</html>