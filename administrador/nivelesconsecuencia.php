<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Niveles de consecuencia</title>
    <?php
    // Incluir archivos PHP y establecer la conexión a la base de datos
    include ('vistas\custom_header.html');
    include ('vistas\nav.php');
    include ('conexion.php');
    include ('vistas/table_header.html');
    ?>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid">
        <h1>Lista de niveles de consecuencia</h1>
    </div>
    <br>
    <div class="container">
        <div>
            <a type="button" role="button" tabindex="0"  class="text-dark" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="right"
                data-bs-custom-class="custom-popover" data-bs-title="¿Por qué no puedo agregar, eliminar o editar nuevos niveles?"
                data-bs-content="Los niveles mostrados en la tabla son los establecidos por la GTC-45(Guia tecnica colombiana) esto para una mayor compresión y facilidad a la hora de valorar peligros, por esa razon los valores mostrados no pueden ser cambiados o no en la versión actual del programa.">
                <span class="material-icons fs-2">
                quiz
            </span>
            </a>
        </div>
        <!-- Tabla para mostrar los niveles de consecuencia -->
        <div class="table-responsive">
            <table id="tbl_id" class="table table-bordered table-striped">
                <thead class="table-primary align-middle text-center">
                    <tr>
                        <th>Valor NC</th>
                        <th>Nivel de consecuencia</th>
                        <th>Significado / Daños personales</th>
                    </tr>
                </thead>
                <tbody class="table-striped table-hover">
                    <?php
                    // Consulta a la base de datos para obtener los niveles de consecuencia
                    $nivelconsecuencia = $con->query("SELECT * FROM tblnivelconsecuencia");
                    // Iterar sobre los resultados y mostrarlos en la tabla
                    foreach ($nivelconsecuencia as $nc) {
                        ?>
                        <tr>
                            <td><?php echo $nc['ValorNivelConsecuencia']; ?></td>
                            <td><?php echo $nc['Nombre']; ?></td>
                            <td><?php echo $nc['Significado']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
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
