<?php
$pagina = 'elemento de protección personal';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elementos protección personal</title>
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
        <h1>Lista de elementos de protección personal</h1>
    </div>

    <br>

    <div class="modal fade" id="modalAddEpp" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bodyAdmin">
                    <h5 class="modal-title" id="modalAddAutor">Registrar un nuevo elemento de protección personal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="agregar_epp.php" class="needs-validation" method="POST" novalidate>
                        <div class="form-group mb-3">
                            <label for="epp" class="fw-medium form-label">Nombre del nuevo elemento de protección
                                personal:</label>
                            <input type="text" class="form-control form-control-sm" name="epp" id="epp" placeholder="Nombre del elemento de protección personal"required>
                            <div class="valid-feedback">
                                ¡Perfecto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor, ingrese el nombre del elemento de protección personal.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </form>

                </div>

                <div class="modal-footer">
                    Se añadirá el nuevo elemento de protección personal a la base de datos.
                </div>
            </div>
        </div>

    </div>


    <div class="container">
        <buttom type="buttom" class="btn btn-dark btn-md mb-4  p-2 rounded-5 " data-bs-toggle="modal"
            data-bs-target="#modalAddEpp">
            <div class="d-flex align-items-center ">
                <span class="material-icons">add</span>
                <div class=""><b>Añadir elemento de protección personal</b></div>
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

                $epps = $con->query("SELECT * FROM tblelementosproteccionpersonal");
                foreach ($epps as $epp) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $epp['Codigo']; ?>
                        </td>
                        <td>
                            <?php echo $epp['Nombre']; ?>
                        </td>
                        <td class="d-flex justify-content-center gap-2">

                            <a type="button" data-bs-toggle="modal"
                                data-bs-target="#editarModal<?php echo $epp['Codigo']; ?>">
                                <span class="material-icons btn btn-outline-primary btn-sm">edit</span>
                            </a>


                            <div class="modal fade" id="editarModal<?php echo $epp['Codigo']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bodyAdmin">
                                            <h5 class="modal-title" id="modalAddAutor">Editar elemento protección personal
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="update_epp.php" class="needs-validation" method="POST" novalidate>
                                                <div class="form mb-3">
                                                    <label for="epp_edit" class="form-label fw-medium">Nombre del elemento de
                                                        protección
                                                        personal:</label>
                                                    <input type="text" class="form-control form-control-sm" name="epp_edit" id="epp_edit"
                                                        value="<?php echo $epp['Nombre'] ?>"
                                                        placeholder="Elemento protección personal" required>
                                                    <div class="invalid-feedback">
                                                        Por favor, ingrese el nombre del elemento de protección personal.
                                                    </div>
                                                    <input type="hidden" name="codigo_editar"
                                                        value="<?php echo $epp['Codigo'] ?>">
                                                </div>
                                                <div class="gap-2">
                                                    <button type="submite" class="btn btn-primary">Actualizar</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="modal-footer">
                                            Se actualizará el elemento de protección personal en la base de datos.
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Segundo botón -->
                            <a type="button" onclick="return confirmarEliminarEpp(<?php echo $epp['Codigo']; ?>);">
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
