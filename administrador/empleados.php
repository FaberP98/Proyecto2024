<?php
$pagina = 'empleado';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
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
        <h1>Lista de empleados</h1>
    </div>

    <br>

    <div class="modal fade" id="modalAddEmpleado" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bodyAdmin">
                    <h5 class="modal-title" id="modalAddAutor">Registrar un nuevo empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="agregar_empleado.php" class="needs-validation" method="POST" novalidate>
                        <div class="form-group mb-3">
                            <label for="DocId" class="fw-medium form-label">Cédula del empleado:</label>
                            <input type="text" class="form-control form-control-sm" id="DocId" name="DocId" placeholder="Cédula del empleado" required>
                            <div class="valid-feedback">
                                ¡Perfecto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, ingrese la cedula del empleado.
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="Nombres" class="fw-medium form-label">Nombres del empleado:</label>
                                    <input type="text" class="form-control form-control-sm" name="Nombres" id="Nombres" placeholder="Nombres del empleado" required>
                                    <div class="valid-feedback">
                                        ¡Perfecto!
                                    </div>
                                    <div class="invalid-feedback">
                                        Por favor, ingrese los nombres del empleado.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="Apellidos" class="fw-medium form-label">Apellidos del empleado:</label>
                                    <input type="text" class="form-control form-control-sm" name="Apellidos" id="Apellidos" placeholder="Apellidos del empleado" required>
                                    <div class="valid-feedback">
                                        ¡Perfecto!
                                    </div>
                                    <div class="invalid-feedback">
                                        Por favor, ingrese los apellidos del empleado.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="Cargo" class="fw-medium form-label">Seleccione el cargo del empleado:</label>
                            <select name="Cargo" id="Cargo" class="form-select form-select-sm" required>
                                <option value="">Seleccione un cargo</option>
                                <?php
                                include ('conexion.php');
                                $Cargo = $con->query("SELECT * FROM tblcargo");
                                while ($fila = $Cargo->fetch_assoc()) {
                                    echo "<option value='" . $fila['Codigo'] . "'>" . $fila['Nombre'] . "</option>";
                                }
                                ?>
                            </select>
                            <div class="valid-feedback">
                                ¡Perfecto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, seleccione un cargo.
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <label for="Correo" class="fw-medium form-label">Correo electrónico del empleado:</label>
                            <input type="email" class="form-control form-control-sm" name="Correo" id="Correo" placeholder="Correo electrónico del empleado" required>
                            <div class="valid-feedback">
                                ¡Perfecto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, ingrese el correo del empleado.
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <label for="Celular" class="fw-medium form-label">Celular del empleado:</label>
                            <input type="text" class="form-control form-control-sm" name="Celular" id="Celular" placeholder="Celular del empleado" required>
                            <div class="valid-feedback">
                                ¡Perfecto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, ingrese el celular del empleado.
                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary">Agregar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    Se añadirá el nuevo empleado a la base de datos.
                </div>
            </div>
        </div>

    </div>


    <div class="container">
        <buttom type="buttom" class="btn btn-dark btn-md mb-4  p-2 rounded-5 " data-bs-toggle="modal"
            data-bs-target="#modalAddEmpleado">
            <div class="d-flex align-items-center ">
                <span class="material-icons">add</span>
                <div class=""><b>Añadir empleado</b></div>
            </div>
        </buttom>
        <table id="tbl_empleado" class="table table-bordered table-striped">
            <thead class="table-primary align-middle text-center">
                <tr>
                    <th>DocId</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Cargo</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-striped table-hover">
                <?php

                $empleados = $con->query("SELECT em.DocId, em.Nombres, em.Apellidos,em.Cargo as cargo, ca.Nombre as Cargo, em.Correo, em.Celular 
                FROM tblempleado as em 
                INNER JOIN tblcargo as ca ON em.Cargo = ca.Codigo;");
                foreach ($empleados as $empleado) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $empleado['DocId']; ?>
                        </td>
                        <td>
                            <?php echo $empleado['Nombres']; ?>
                        </td>
                        <td>
                            <?php echo $empleado['Apellidos']; ?>
                        </td>
                        <td>
                            <?php echo $empleado['Cargo']; ?>
                        </td>
                        <td>
                            <?php echo $empleado['Correo']; ?>
                        </td>
                        <td>
                            <?php echo $empleado['Celular']; ?>
                        </td>
                        <td class="d-flex justify-content-center align-items-center gap-2">

                            <a type="button" data-bs-toggle="modal"
                                data-bs-target="#editarModal<?php echo $empleado['DocId']; ?>">
                                <span class="material-icons btn btn-outline-primary btn-sm">edit</span>
                            </a>


                            <div class="modal fade" id="editarModal<?php echo $empleado['DocId']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bodyAdmin">
                                            <h5 class="modal-title" id="modalAddAutor">Editar información empleado
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="update_empleado.php" class="needs-validation" method="POST"
                                                novalidate>
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Nombre_edit" class="fw-medium form-label">Nombre del
                                                                empleado:</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="Nombre_edit"
                                                                value="<?php echo $empleado['Nombres'] ?>"
                                                                placeholder="Nombres del empleado" id="Nombre_edit" required>
                                                            <div class="invalid-feedback">
                                                                Por favor, ingrese el nombre del empleado.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Apellido_edit" class="fw-medium form-label">Apellido
                                                                del empleado:</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="Apellido_edit"
                                                                value="<?php echo $empleado['Apellidos'] ?>"
                                                                placeholder="Apellidos del empleado" id="Apellido_edit" required>
                                                            <div class="invalid-feedback">
                                                                Por favor, ingrese el apellido del empleado.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group my-3">
                                                    <label for="Cargo_edit" class="fw-medium form-label">Cargo del
                                                        empleado:</label>
                                                    <select name="Cargo_edit" class="form-select form-select-sm" id="Cargo_edit" required>
                                                        <?php
                                                        // Iterar sobre las actividades y mostrarlas como opciones
                                                        foreach ($Cargo as $Carg) {
                                                            $selected = ($Carg['Codigo'] == $empleado['cargo']) ? 'selected' : '';
                                                            echo "<option value='{$Carg['Codigo']}' {$selected}>{$Carg['Nombre']}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Por favor, seleccione un cargo.
                                                    </div>
                                                </div>

                                                <div class="form-group my-3">
                                                    <label for="Correo_edit" class="fw-medium form-label">Correo del
                                                        empleado:</label>
                                                    <input type="email" class="form-control form-control-sm"
                                                        name="Correo_edit" value="<?php echo $empleado['Correo'] ?>"
                                                        placeholder="Correo electronico del empleado" id="Correo_edit" required>
                                                    <div class="invalid-feedback">
                                                        Por favor, ingrese el correo del empleado.
                                                    </div>
                                                </div>

                                                <div class="form-group my-3">
                                                    <label for="Celular_edit" class="fw-medium form-label">Celular del
                                                        empleado:</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="Celular_edit" value="<?php echo $empleado['Celular'] ?>"
                                                        placeholder="Celular del empleado" id="Celular_edit" required>
                                                    <div class="invalid-feedback">
                                                        Por favor, ingrese el celular del empleado.
                                                    </div>
                                                </div>

                                                <input type="hidden" name="codigo_editar"
                                                    value="<?php echo $empleado['DocId'] ?>">

                                                <div class="gap-2">
                                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                </div>
                                            </form>

                                        </div>

                                        <div class="modal-footer">
                                            Se actualizará el empleado en la base de datos.
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Segundo botón -->
                            <a type="button" onclick="return confirmarEliminarEmpleado(<?php echo $empleado['DocId']; ?>);">
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