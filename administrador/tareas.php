<?php
$pagina = 'tarea';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
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
        <h1>Lista de tareas</h1>
    </div>

    <br>

    <div class="modal fade" id="modalAddTarea" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bodyAdmin">
                    <h5 class="modal-title" id="modalAddAutor">Registrar una nueva tarea</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="formulario_agregar_tarea.php" class="needs-validation" method="POST" novalidate>
                        <div class="form-group mb-3">

                            <label for="Nombre" class="form-label fw-medium">Nombre tarea:</label>
                            <input type="text" name="Nombre" class="form-control form-control-sm mb-3" id="Nombre" placeholder="Nombre de la tarea" required>
                            <div class="valid-feedback">
                                ¡Perfecto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, ingrese el nombre de la nueva tarea.
                            </div>

                        </div>
                        <div class="form-group mb-3">
                            <label for="Actividad" class="form-label fw-medium">Selecciona la actividad con la que se
                                relaciona:</label>
                            <select name="Actividad" id="Actividad" class="form-select form-select-sm mb-3" required>
                                <option value="">Seleccione una actividad</option>
                                <?php
                                $actividad = $con->query("SELECT * FROM tblactividad");
                                while ($fila = $actividad->fetch_assoc()) {
                                    echo "<option value='" . $fila['Codigo'] . "'>" . $fila['Nombre'] . "</option>";
                                }
                                ?>
                            </select>
                            <div class="valid-feedback">
                                ¡Perfecto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, seleccione la actividad con la que se relaciona.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="Rutinario" class="form-label fw-medium">¿La tarea es rutinaria?</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Rutinario" id="opcion1"
                                        value="1">
                                    <label class="form-check-label" for="opcion1">Sí</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="Rutinario" id="opcion2" value="0"
                                        checked>
                                    <label class="form-check-label" for="opcion2">No</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Agregar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <div class="container">

        <buttom type="buttom" class="btn btn-dark btn-md mb-4  p-2 rounded-5 " data-bs-toggle="modal"
            data-bs-target="#modalAddTarea">
            <div class="d-flex align-items-center ">
                <span class="material-icons">add</span>
                <div class=""><b>Añadir tarea</b></div>
            </div>
        </buttom>

        <table id="tbltarea" class="table table-bordered table-striped">
            <thead class="table-primary align-middle text-center">
                <tr>
                    <th>Numero</th>
                    <th>Nombre</th>
                    <th>Actividad relacionada</th>
                    <th>Rutinaria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-striped table-hover">
                <?php
                // Consulta SQL para obtener las tareas
                // Consulta SQL para obtener las actividades
                

                $tareas = $con->query("SELECT t.Codigo, t.Nombre,t.Actividad as AC, a.Nombre as NombreActividad, t.Rutinario
                 FROM tbltarea t
                INNER JOIN tblactividad a ON t.Actividad = a.Codigo");

                // Iterar sobre las tareas y mostrarlas en la tabla
                foreach ($tareas as $tarea) {
                    ?>
                    <tr class="">
                        <td>
                            <?php echo $tarea['Codigo']; ?>
                        </td>
                        <td>
                            <?php echo $tarea['Nombre']; ?>
                        </td>
                        <td>
                            <?php echo $tarea['NombreActividad']; ?>
                        </td>
                        <td>
                            <?php echo ($tarea['Rutinario'] == 1) ? 'Rutinaria' : 'Ocasional'; ?>
                        </td>
                        <td class="td-flex justify-content-center gap-2">

                            <a type="button" data-bs-toggle="modal"
                                data-bs-target="#editarModal<?php echo $tarea['Codigo']; ?>">
                                <span class="material-icons btn btn-outline-primary btn-sm">edit</span>
                            </a>

                            <div class="modal fade" id="editarModal<?php echo $tarea['Codigo']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bodyAdmin">
                                            <h5 class="modal-title" id="modalAddAutor">Editar tarea</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="update.php" class="needs-validation" method="POST" novalidate>
                                                <div class="form mb-3">
                                                    <label for="Nombre_edit" class="form-label fw-medium">Nombre de la tarea:</label>
                                                    <input type="text" class="form-control mb-3 form-control-sm" name="Nombre"
                                                        value="<?php echo $tarea['Nombre'] ?>" placeholder="Nombre de la tarea" id="Nombre_edit"  required>
                                                    <div class="invalid-feedback">
                                                        Por favor, ingrese el nuevo nombre de la tarea.
                                                    </div>
                                                    <input type="hidden" name="Codigo"
                                                        value="<?php echo $tarea['Codigo'] ?>">

                                                    <label for="Actividad_edit" class="form-label fw-medium">Actividad relacionada:</label>
                                                    <select name="Actividad" id="Actividad_edit" class="form-select form-select-sm">
                                                        <?php
                                                        // Iterar sobre las actividades y mostrarlas como opciones
                                                        foreach ($actividad as $Actividad) {
                                                            $selected = ($Actividad['Codigo'] == $tarea['AC']) ? 'selected' : '';
                                                            echo "<option value='{$Actividad['Codigo']}' {$selected}>{$Actividad['Nombre']}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="Rutinario_edit" class="form-label fw-medium">¿La tarea es
                                                        rutinaria?</label>
                                                    <br>
                                                    <input type="radio" class="form-check-input" name="Rutinario" value="1"
                                                        id="opcion1" <?php echo ($tarea['Rutinario'] == 1) ? 'checked' : ''; ?>> Sí

                                                    <input type="radio" class="form-check-input" name="Rutinario" value="0"
                                                        id="opcion2" <?php echo ($tarea['Rutinario'] == 0) ? 'checked' : ''; ?>> No
                                                </div>

                                                <div class="gap-2">
                                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <a type="button" onclick="return confirmarEliminarTarea(<?php echo $tarea['Codigo']; ?>);">
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