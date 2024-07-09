<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfiles</title>
    <link rel="stylesheet" href="./css/style_admin.css">
    <?php
    // Incluye archivos PHP y establece la conexión a la base de datos
    include ('vistas\custom_header.html');
    include ('vistas\nav.php');
    include ('conexion.php');
    include ('vistas/table_header.html');
    ?>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include ('validaciones/validaciones.php')
        ?>

    <!-- Se crea un contenedor que contendra el titulo -->
    <div class="container-fluid mb-3">
        <!-- Titulo de la pagina -->
        <h1>Lista de perfiles</h1>
    </div>

    <!-- Se crea un contenedor que contendra la tabal y el boton de agregar perfil  -->
    <div class="container">
        <a type="button" role="button" tabindex="0" class="text-dark" data-bs-toggle="popover" data-bs-trigger="focus"
            data-bs-placement="right" data-bs-custom-class="custom-popover"
            data-bs-title="¿Por qué no puedo agregar o eliminar perfiles?"
            data-bs-content="Los perfiles utilizados en el programa ya están establecidos, por lo que no se pueden agregar nuevos perfiles ni eliminar los actuales.">
            <span class="material-icons fs-2">
                quiz
            </span>
        </a>


        <!-- Tabla con los datos -->
        <table id="tbl_id" class="table table-bordered table-striped">
            <!-- Header de la tabla -->
            <thead class="table-primary align-middle text-center">
                <!-- Fila principal de la tabla con los titulos de cada coluumna -->
                <tr>
                    <!-- Nombre de la columna 1 de la tabla -->
                    <th>Numero</th>
                    <!-- Nombre de la columna 2 de la tabla -->
                    <th>Nombre</th>
                    <!-- Nombre de la columna 3 de la tabla -->
                    <th>Acciones</th>
                </tr>

            </thead>
            <!-- Body de la tabla -->
            <tbody class="table-striped table-hover">
                <!-- Codigo php que llenara la tabla automaticamente -->
                <?php
                // Variable que contendra la consulta a la tabla peril
                $perfiles = $con->query("SELECT * FROM tblperfil");
                // Foreach utilizado para iterar sobre la variable perfiles y traer sus datos 
                foreach ($perfiles as $perfil) {
                    ?>
                    <tr>
                        <!-- Campo que se llenara con el  campo Codigo de la tabla perfil -->
                        <td>
                            <?php echo $perfil['Codigo']; ?>
                        </td>
                        <!-- Campo que se llenara con el campo Nombre de la tabla perfil -->
                        <td>
                            <?php echo $perfil['Nombre']; ?>
                        </td>
                        <!-- Columna que contiene el boton de editar y eliminar -->
                        <td class="d-flex justify-content-center gap-2">


                            <!-- Boton de editar que se relaciona con un modal con el id="#editarModal echo $perfil['Codigo'];" -->
                            <a type="button" data-bs-toggle="modal"
                                data-bs-target="#editarModal<?php echo $perfil['Codigo']; ?>">
                                <span class="material-icons btn btn-outline-primary btn-sm">edit</span>
                            </a>

                            <!-- Ventana modal  que se relacion con un  boton gracias al id= #editarModal echo $perfil['Codigo'];-->
                            <div class="modal fade" id="editarModal<?php echo $perfil['Codigo']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <!-- Contenedor principal del modal -->
                                    <div class="modal-content">
                                        <!-- Header de la ventana modal -->
                                        <div class="modal-header bodyAdmin">
                                            <!-- Titulo -->
                                            <h5 class="modal-title" id="modalAddAutor">Editar perfil</h5>
                                            <!-- Boton X para cerrar la ventana modal -->
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <!-- Body del modal -->
                                        <div class="modal-body">
                                            <!-- Formulario para editar un perfil con el metodo POST y que enviara los datos ingresados a la pagina update_perfil.php-->
                                            <form action="update_perfil.php" class="needs-validation" method="POST"
                                                novalidate>
                                                <!-- Div que contiene contiene un input y un label para mayor orden -->
                                                <div class="form mb-3">
                                                    <!-- Label para indicar que dato se pide ingresar -->
                                                    <label for="perfil_edit" class="fw-medium form-label">Nombre del
                                                        perfil:</label>
                                                    <!-- input tipo texto con el name perfil_edit que sera utilizado en update_perfil.php -->
                                                    <input type="text" class="form-control form-control-sm" id="perfil_edit"
                                                        name="perfil_edit" value="<?php echo $perfil['Nombre'] ?>"
                                                        placeholder="Perfil" required>
                                                    <div class="invalid-feedback">
                                                        Por favor, ingrese el nuevo nombre del perfil.
                                                    </div>
                                                    <!-- Codigo del perfil seleccionado que estara oculto y tendra el name perfil_editar que sera utilizado en update_perfil.php -->
                                                    <input type="hidden" name="perfil_editar"
                                                        value="<?php echo $perfil['Codigo'] ?>">
                                                </div>
                                                <!-- Div que contiene contiene los botones para mayor orden-->
                                                <div class="gap-2">
                                                    <!-- Boton de actualizar el cual enviara el formulario -->
                                                    <button type="submite" class="btn btn-primary">Actualizar</button>
                                                    <!-- Boton de cancelar el cual cerrara la ventana modal -->
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Footer de la ventana modal -->
                                        <div class="modal-footer">
                                            Se actualizará el perfil en la base de datos.
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

    <script>
        // Inicializar los popovers de Bootstrap
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
        const popover = new bootstrap.Popover('.popover-dismiss', {
            trigger: 'focus'
        })
    </script>
    <?php
    include ('vistas/table_script.html');
    ?>

</body>

</html>