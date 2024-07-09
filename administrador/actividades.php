<?php
$pagina = 'actividad';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
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
        <h1>Lista de actividades</h1>
    </div>

    <br>


    <div class="modal fade" id="modalAddActividad" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bodyAdmin">
                    <h5 class="modal-title" id="modalAddAutor">Registrar una nueva actividad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="formulario_agregar_actividad.php" class="needs-validation" method="POST" novalidate>
                        <div class="form-group mb-3">
                            <label for="Nombre" class="fw-medium form-label">Nombre actividad:</label>
                            <input type="text" name="Nombre" class="form-control form-control-sm" id="Nombre" placeholder="Nombre de la actividad" required>
                            <div class="valid-feedback">
                                ¡Perfecto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, ingrese el nombre de la nueva actividad.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="Proceso" class="fw-medium form-label">Selecciona el proceso con el que se
                                relaciona:</label>
                            <select name="Proceso" id="Proceso" class="form-select form-select-sm" required>
                                <option value="">Seleccione un proceso</option>
                                <?php
                                include ('conexion.php');
                                $procesos = $con->query("SELECT * FROM tblproceso");
                                while ($fila = $procesos->fetch_assoc()) {
                                    echo "<option value='" . $fila['Codigo'] . "'>" . $fila['Nombre'] . "</option>";
                                }
                                ?>
                            </select>
                            <div class="valid-feedback">
                                ¡Perfecto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, seleccione un proceso.
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
            data-bs-target="#modalAddActividad">
            <div class="d-flex align-items-center ">
                <span class="material-icons">add</span>
                <div class=""><b>Añadir actividad</b></div>
            </div>
        </buttom>

        <table id="tbl_four" class="table table-bordered table-striped">
            <thead class="table-primary align-middle text-center">
                <tr>
                    <th>Numero</th>
                    <th>Nombre</th>
                    <th>Proceso relacionado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-striped table-hover">
                <?php
                // Consulta SQL para obtener las tareas
                // Consulta SQL para obtener las actividades
                $actividades = $con->query("SELECT a.Codigo, a.Nombre,a.Proceso as PR, p.Nombre as NombreProceso
            FROM tblactividad a
            INNER JOIN tblproceso p ON a.Proceso = p.Codigo");

                // Iterar sobre las tareas y mostrarlas en la tabla
                foreach ($actividades as $actividad) {
                    ?>
                    <tr class="">
                        <td>
                            <?php echo $actividad['Codigo']; ?>
                        </td>
                        <td>
                            <?php echo $actividad['Nombre']; ?>
                        </td>
                        <td>
                            <?php echo $actividad['NombreProceso']; ?>
                        </td>
                        <td class="d-flex justify-content-center gap-2">

                            <a type="button" data-bs-toggle="modal"
                                data-bs-target="#editarModal<?php echo $actividad['Codigo']; ?>">
                                <span class="material-icons btn btn-outline-primary btn-sm">edit</span>
                            </a>

                            <div class="modal fade" id="editarModal<?php echo $actividad['Codigo']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bodyAdmin">
                                            <h5 class="modal-title" id="modalAddAutor">Editar actividad</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="update_actividad.php" class="needs-validation" method="POST"
                                                novalidate>
                                                <div class="form mb-3">
                                                    <label for="Nombre_edit" class="fw-medium form-label">Nombre de la actividad:</label>
                                                    <input type="text" class="form-control form-control-sm mb-3" name="Nombre"
                                                        value="<?php echo $actividad['Nombre'] ?>" id="Nombre_edit" placeholder="Nombre de la actividad"
                                                        required>
                                                    <input type="hidden" name="Codigo"
                                                        value="<?php echo $actividad['Codigo'] ?>">
                                                    <div class="invalid-feedback">
                                                        Por favor, ingrese el nombre de la nueva actividad.
                                                    </div>

                                                    <label for="Proceso_edit" class="form-label fw-medium">Proceso relacionado:</label>
                                                    <select name="Proceso" id="Proceso_edit" class="form-select form-select-sm">
                                                        <?php
                                                        // Iterar sobre las actividades y mostrarlas como opciones
                                                        foreach ($procesos as $Proceso) {
                                                            $selected = ($Proceso['Codigo'] == $actividad['PR']) ? 'selected' : '';
                                                            echo "<option value='{$Proceso['Codigo']}' {$selected}>{$Proceso['Nombre']}</option>";
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
                                    </div>
                                </div>

                            </div>
                            <a type="button" 
                                onclick="return confirmarEliminarActividad(<?php echo $actividad['Codigo']; ?>);">
                                <span class="material-icons btn btn-outline-danger btn-sm">delete</span>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <script src="ventana.js"></script>
<?php
    include ('vistas/table_script.html');
    ?>
</body>

</html>