<?php
$pagina = 'clasificación';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clasificación de Peligros</title>
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
        <h1>Lista de clasificaciones de Peligros</h1>
    </div>

    <br>


    <div class="modal fade" id="modalAddClasificacion" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bodyAdmin">
                    <h5 class="modal-title" id="modalAddAutor">Registrar una nueva clasificación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="agregar_clasificacion.php" class="needs-validation" method="POST" novalidate>
                        <div class="form-group mb-3">
                            <label for="clasificacion" class="form-label fw-medium">Nombre de la nueva clasificación:</label>
                            <input type="text" class="form-control form-control-sm" name="clasificacion" id="clasificacion" placeholder="Nombre de la clasificación" required>
                            <div class="valid-feedback">
                                ¡Perfecto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, ingrese el nombre de la clasificación.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </form>

                </div>

                <div class="modal-footer">
                    Se añadirá la nueva clasificacion a la base de datos.
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <buttom type="buttom" class="btn btn-dark btn-md mb-4  p-2 rounded-5 " data-bs-toggle="modal"
            data-bs-target="#modalAddClasificacion">
            <div class="d-flex align-items-center ">
                <span class="material-icons">add</span>
                <div class=""><b>Añadir clasificación</b></div>
            </div>
        </buttom>
        <table id="tbl_id" class="table table-bordered table-striped">
            <thead class="table-primary align-middle text-center">
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
                
                $clasificaciones = $con->query("SELECT * FROM tblclasificacionpeligro");

                // Iterar sobre las tareas y mostrarlas en la tabla
                foreach ($clasificaciones as $clasificacion) {
                    ?>
                    <tr class="">
                        <td>
                            <?php echo $clasificacion['Codigo']; ?>
                        </td>
                        <td>
                            <?php echo $clasificacion['Nombre']; ?>
                        </td>
                        <td class="d-flex justify-content-center gap-2">

                            <!-- Primer botón -->

                            <a type="button" data-bs-toggle="modal"
                                data-bs-target="#editarModal<?php echo $clasificacion['Codigo']; ?>">
                                <span class="material-icons btn btn-outline-primary btn-sm">edit</span>
                            </a>


                            <div class="modal fade" id="editarModal<?php echo $clasificacion['Codigo']; ?>"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bodyAdmin">
                                            <h5 class="modal-title" id="modalAddAutor">Editar clasificación</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="update_clasificacion.php" class="needs-validation" method="POST" novalidate>
                                                <div class="form mb-3">
                                                    <label for="clasificacion_edit" class="form-label fw-medium">Nombre de la
                                                        clasificación:</label>
                                                    <input type="text" class="form-control form-control-sm" name="clasificacion_edit" id="clasificacion_edit"
                                                        value="<?php echo $clasificacion['Nombre'] ?>"
                                                        placeholder="Nombre de la clasificación" required>

                                                    <div class="invalid-feedback">
                                                        Por favor, ingrese el nombre de la clasificación del peligro.
                                                    </div>
                                                    <input type="hidden" name="codigo_editar"
                                                        value="<?php echo $clasificacion['Codigo'] ?>">
                                                </div>
                                                <div class="gap-2">
                                                    <button type="submite" class="btn btn-primary">Actualizar</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="modal-footer">
                                            Se actualizará la clasificacion en la base de datos.
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Segundo botón -->
                            <a type="button"
                                onclick="return confirmarEliminarClasificacion(<?php echo $clasificacion['Codigo']; ?>);">
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
