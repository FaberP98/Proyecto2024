<?php
$pagina = 'descripción';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descripción de peligros</title>
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
        <h1>Lista de descripciones de peligros</h1>
    </div>
    <br>

    <div class="modal fade" id="modalAddDescripcion" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bodyAdmin">
                    <h5 class="modal-title" id="modalAddAutor">Registrar una nueva descripción de peligros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="agregar_descripcion.php" class="needs-validation" method="POST" novalidate>
                        <div class="form-group mb-3">
                            <label for="Nombre" class="fw-medium form-label">Descripción del peligro:</label>
                            <input type="text" name="Nombre" class="form-control form-control-sm" id="Nombre" placeholder="Descripción del peligro" required>
                            <div class="valid-feedback">
                                ¡Perfecto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, ingrese la descripción del peligro.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="Clasificacion" class="fw-medium form-label">Selecciona la Clasificación con la
                                que se
                                relaciona:</label>
                            <select name="Clasificacion" id="Clasificacion" class="form-select form-select-sm" required>
                                <option value="">Seleccione un proceso</option>
                                <?php
                                include ('conexion.php');
                                $Clasificaciones = $con->query("SELECT * FROM tblclasificacionpeligro");
                                while ($fila = $Clasificaciones->fetch_assoc()) {
                                    echo "<option value='" . $fila['Codigo'] . "'>" . $fila['Nombre'] . "</option>";
                                }
                                ?>
                            </select>
                            <div class="valid-feedback">
                                ¡Perfecto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, seleccione una clasificación.
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Agregar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
                <div class="modal-footer">
                    Se añadira la nueva descripción a la base de datos.
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container">

        <buttom type="buttom" class="btn btn-dark btn-md mb-4  p-2 rounded-5 " data-bs-toggle="modal"
            data-bs-target="#modalAddDescripcion">
            <div class="d-flex align-items-center ">
                <span class="material-icons">add</span>
                <div class=""><b>Añadir descripción</b></div>
            </div>
        </buttom>

        <table id="tbl_four" class="table table-bordered table-striped">
            <thead class="table-primary align-middle text-center">
                <tr>
                    <th>Numero</th>
                    <th>Clasificación peligro</th>
                    <th>Descripción peligro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-striped table-hover">
                <?php
                // Consulta SQL para obtener las tareas
                // Consulta SQL para obtener las actividades
                

                $descripciones = $con->query("SELECT DE.Codigo, DE.Nombre, DE.Clasificacion as Clasif, CL.Nombre as NombreClasificacion
                FROM tbldescripcionpeligro as DE
                INNER JOIN tblclasificacionpeligro as CL ON DE.Clasificacion = CL.Codigo;
                ");

                // Iterar sobre las tareas y mostrarlas en la tabla
                foreach ($descripciones as $descripcion) {
                    ?>
                    <tr class="">
                        <td>
                            <?php echo $descripcion['Codigo']; ?>
                        </td>
                        <td>
                            <?php echo $descripcion['NombreClasificacion']; ?>
                        </td>
                        <td>
                            <?php echo $descripcion['Nombre']; ?>
                        </td>

                        <td class="d-flex justify-content-center p-3 gap-2">

                            <a type="button" data-bs-toggle="modal"
                                data-bs-target="#editarModal<?php echo $descripcion['Codigo']; ?>">
                                <span class="material-icons btn btn-outline-primary btn-sm">edit</span>
                            </a>

                            <div class="modal fade" id="editarModal<?php echo $descripcion['Codigo']; ?>"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bodyAdmin">
                                            <h5 class="modal-title" id="modalAddAutor">Editar descripción peligro</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="update_descripcion.php" class="needs-validation" method="POST"
                                                novalidate>
                                                <div class="form mb-3">
                                                    <label for="Nombre_edit" class="form-label fw-medium">Descripción del peligro</label>
                                                    <input type="text" class="form-control form-control-sm mb-3" name="Nombre" id="Nombre_edit"
                                                        value="<?php echo $descripcion['Nombre'] ?>" placeholder="Descripción del peligro"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Por favor, ingrese la descripción del peligro.
                                                    </div>
                                                    <input type="hidden" name="Codigo"
                                                        value="<?php echo $descripcion['Codigo'] ?>">

                                                    <label for="Clasificacion_edit" class="form-label fw-medium">Selecciona la clasificación relacionada:</label>
                                                    <select name="Clasificacion" id="Clasificacion_edit" class="form-select form-select-sm">
                                                        <?php
                                                        // Iterar sobre las actividades y mostrarlas como opciones
                                                        foreach ($Clasificaciones as $Clasificacion) {
                                                            $selected = ($Clasificacion['Codigo'] == $descripcion['Clasif']) ? 'selected' : '';
                                                            echo "<option value='{$Clasificacion['Codigo']}' {$selected}>{$Clasificacion['Nombre']}</option>";
                                                        }
                                                        ?>
                                                    </select>

                                                </div>
                                                <div class="gap-2">
                                                    <button type="submite" class="btn btn-primary">Actualizar</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            Se añadira la nueva descripción a la base de datos.
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <a type="button"
                                onclick="return confirmarEliminarDescripcion(<?php echo $descripcion['Codigo']; ?>);">
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
