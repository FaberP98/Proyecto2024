<?php
// Inicia la sesión
session_start();

// Verifica si la variable de sesión 'docid' no está establecida
if (!isset($_SESSION['docid'])) {
    // Si no está establecida, muestra una alerta y redirige a la página de inicio de sesión
    echo '
        <script>
            alert("Por favor debes iniciar sesión");
            window.location = "login.php";
        </script>
    ';
    // Destruye la sesión
    session_destroy();
    // Termina la ejecución del script
    die();
}
?>

<?php

//PENDIENTES: Colores de celdas de calculos, lo de EPP y la analística. Ajustar la letra a los placeholder

include('conexion.php');

$query =

    "SELECT 
mp.Codigo, 
mp.Fecha, 
mp.detallepeligro, 
mp.ControlFuente, 
mp.ControlMedio, 
mp.ControlIndividuo, 
mp.NumeroExpuesto, 
mp.EfectosPosibles, 
mp.MiEliminacion, 
mp.MiSustitucion, 
mp.MiControlIngenieria, 
mp.MiControlAdministrativo, 
ta.Nombre AS 'Tarea', 
zl.Nombre AS 'ZonaLugar',
ca.Nombre AS 'Cargo', 
dp.Nombre AS 'DescripcionPeligro', 
nd.Nombre AS 'NivelDeficiencia',  
ne.Nombre AS 'NivelExposicion', 
nc.Nombre AS 'NivelConsecuencia', 
ac.Nombre AS 'Actividad', 
pr.Nombre AS 'Proceso', 
cp.Nombre AS 'Clasificacion', 
mp.NivelDeficiencia, 
mp.NivelExposicion, 
nc.Nombre AS 'NivelConsecuencia', 
(mp.NivelDeficiencia * mp.NivelExposicion) AS 'NivelProbabilidad', 
ta.Rutinario AS 'Rutinario', 
((mp.NivelDeficiencia * mp.NivelExposicion) * mp.NivelConsecuencia) AS 'NivelRiesgoIntervencion', 
mp.MiEliminacion, 
mp.MiSustitucion, 
mp.MiControlIngenieria, 
mp.MiControlAdministrativo,  
es.Nombre AS 'Estado',

GROUP_CONCAT(epp.nombre separator', ') as elemento

FROM 
tblmatrizpeligros AS mp 
INNER JOIN 
tbltarea AS ta ON mp.Tarea = ta.Codigo 
INNER JOIN 
tblZonaLugar AS zl ON mp.ZonaLugar = zl.Codigo 
INNER JOIN 
tblDescripcionPeligro AS dp ON mp.DescripcionPeligro = dp.Codigo 
INNER JOIN 
tblclasificacionpeligro AS cp ON dp.Clasificacion = cp.Codigo 
INNER JOIN 
tblactividad AS ac ON ta.Actividad = ac.Codigo 
INNER JOIN 
tblproceso AS pr ON ac.Proceso = pr.Codigo 
INNER JOIN 
tblNivelDeficiencia AS nd ON mp.NivelDeficiencia = nd.ValorNivelDeficiencia 
INNER JOIN 
tblNivelExposicion AS ne ON mp.NivelExposicion = ne.ValorNivelExposicion 
INNER JOIN 
tblNivelConsecuencia AS nc ON mp.NivelConsecuencia = nc.ValorNivelConsecuencia 
INNER JOIN 
tblestado AS es ON mp.Estado = es.Codigo
INNER JOIN
tbleppmatrizpeligros as epm ON mp.Codigo = epm.CodigoMatrizPeligros
INNER JOIN 
tblelementosproteccionpersonal as epp ON epm.CodigoElementosProteccionPersonal = epp.Codigo
INNER JOIN 
tblcargos as ca ON mp.Cargos = ca.Codigo
GROUP BY mp.Codigo
ORDER BY mp.Codigo";

$resultado = $con->query($query) //$resultado guarda la consulta 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Agrega el enlace a la página de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Matriz</title>

    <?php
    include('../administrador/vistas/table_header.html'); //lo llamo para que funcione el datatable
    include('vistas/script.php');
    ?>
</head>


<body class=bg-info-subtle>
    <?php
    include('vistas/nav1.php');
    ?>
    <!-- No me quiereinmovilizar las 3 filas de encabezados -->
    <style>
               
/*Estilos para fijar las primeras 6 columnas*/
        #tabla_matriz th:nth-child(-n+6),
        #tabla_matriz td:nth-child(-n+6) {
            position: sticky;
            left: 0;
            z-index: 1;
            /* Asegura que las filas fijas estén por encima de otras */
        }

        /* Evita que los elementos fijos queden sobrepuestos por el encabezado */
        .table-responsive {
            overflow-x: auto; /* Solo permite desplazamiento horizontal */
        }

        /* Ajusta el ancho de las columnas */
        #tabla_matriz th,
        #tabla_matriz td {
            white-space: nowrap;   /* Evita que el texto se rompa */
        }

        #tabla_matriz th {
            min-width: 100px; /* Define un ancho mínimo para las celdas de encabezado */
        }

        /* Centrado de texto (opcional) */
        #tabla_matriz th,
        #tabla_matriz td {
            text-align: center;
        }

        /* Centra el texto de los títulos de cada columna */
        #tabla_matriz th h5 {
            text-align: center;
        }
    </style>

    <div class="table-responsive m-5" style="overflow-y: auto;">


        <table class="table table-bordered table-striped table-hover" id="tabla_matriz">
            <thead class="table-primary">
                <tr>
                    <th colspan="30">
                        <h1>IDENTIFICACIÓN DE PELIGROS, EVALUACIÓN Y VALORACIÓN DE RIESGOS - GTC-45
                        </h1>
                    </th>
                </tr>
                <tr>
                    <th colspan="8">
                        <h2>Información de la labor</h2>
                    </th>
                    <th colspan="5">
                        <h2>Información del peligro</h2>
                    </th>
                    <th colspan="3">
                        <h2>Controles existentes</h2>
                    </th>
                    <th colspan="7">
                        <h2>Evaluación de riesgo</h2>
                    </th>
                    <th colspan="1">
                        <h2>Valoración del riesgo</h2>
                    </th>
                    <th colspan="6">
                        <h2>Medidas de intervención</h2>
                    </th>
                </tr>
                <tr>
                    <th hidden>
                        <h5>Código</h5>
                    </th>
                    <th>
                        <h5>Fecha</h5>
                    </th>
                    <th>
                        <h5>Proceso</h5>
                    </th>
                    <th>
                        <h5>Zona/Lugar</h5>
                    </th>
                    <th>
                        <h5>Actividad</h5>
                    </th>
                    <th>
                        <h5>Tarea</h5>
                    </th>
                    <th>
                        <h5>¿La tarea es rutinaria?</h5>
                    </th>
                    <th>
                        <h5>Cargo</h5>
                    </th>
                    <th>
                        <h5>Clasificación</h5>
                    </th>
                    <th>
                        <h5>Descripción</h5>
                    </th>
                    <th>
                        <h5>Detalle</h5>
                    </th>
                    <th>
                        <h5>Efectos posibles</h5>
                    </th>
                    <th>
                        <h5>Número de expuestos</h5>
                    </th>
                    <th>
                        <h5>Fuente</h5>
                    </th>
                    <th>
                        <h5>Medio</h5>
                    </th>
                    <th>
                        <h5>Individuo</h5>
                    </th>
                    <th>
                        <h5>NivelDeficiencia</h5>
                    </th>
                    <th>
                        <h5>Nivel de exposición</h5>
                    </th>
                    <th>
                        <h5>Nivel de probabilidad</h5>
                    </th>
                    <th>
                        <h5>Interpretación nivel de probabilidad</h5>
                    </th>
                    <th>
                        <h5>Nivel de consecuencia</h5>
                    </th>
                    <th>
                        <h5>Nivel de riesgo e intervención</h5>
                    </th>
                    <th>
                        <h5>Interpretación del nivel de riesgo</h5>
                    </th>
                    <th>
                        <h5>Aceptabilidad Del Riesgo</h5>
                    </th>
                    <th>
                        <h5>Eliminación</h5>
                    </th>
                    <th>
                        <h5>Sustitución</h5>
                    </th>
                    <th>
                        <h5>Controles de ingeniería</h5>
                    </th>
                    <th>
                        <h5>Controles administrativos, señalización, advertencia</h5>
                    </th>
                    <th>
                        <h5>Equipo y/o Elementos de protección personal</h5>
                    </th>
                    <th>
                        <h5>Estado</h5>
                    </th>
                </tr>
            </thead>

            <tbody>

                <?php
                //muestra datos en tabla 
                while ($dato = $resultado->fetch_assoc()) {
                ?>

                    <tr>
                        <td hidden><?php echo "{$dato['Codigo']}" ?></td>
                        <td><?php echo "{$dato['Fecha']}" ?></td>
                        <td><?php echo "{$dato['Proceso']}" ?></td>
                        <td><?php echo "{$dato['ZonaLugar']}" ?></td>
                        <td><?php echo "{$dato['Actividad']}" ?></td>
                        <td><?php echo "{$dato['Tarea']}" ?></td>
                        <td><?php echo ($dato['Rutinario'] == 1) ? 'Sí' : 'No'; ?></td>
                        <td><?php echo "{$dato['Cargo']}" ?></td>
                        <td><?php echo "{$dato['Clasificacion']}" ?></td>
                        <td><?php echo "{$dato['DescripcionPeligro']}" ?></td>
                        <td><?php echo "{$dato['detallepeligro']}" ?></td>
                        <td><?php echo "{$dato['EfectosPosibles']}" ?></td>
                        <td><?php echo "{$dato['NumeroExpuesto']}" ?></td>
                        <td><?php echo "{$dato['ControlFuente']}" ?></td>
                        <td><?php echo "{$dato['ControlMedio']}" ?></td>
                        <td><?php echo "{$dato['ControlIndividuo']}" ?></td>
                        <td><?php echo "{$dato['NivelDeficiencia']}" ?></td>
                        <td><?php echo "{$dato['NivelExposicion']}" ?></td>
                        <td><?php echo "{$dato['NivelProbabilidad']}" ?></td>
                        <td class='intervencion'>
                            <?php if ($dato['NivelProbabilidad'] <= 4) {
                                echo "BAJO";
                            } elseif ($dato['NivelProbabilidad'] <= 8) {
                                echo "MEDIO";
                            } elseif ($dato['NivelProbabilidad'] <= 20) {
                                echo "ALTO";
                            } elseif ($dato['NivelProbabilidad'] <= 40) {
                                echo "MUY ALTO";
                            } ?>
                        </td>
                        <td><?php echo "{$dato['NivelConsecuencia']}" ?></td>
                        <td><?php echo "{$dato['NivelRiesgoIntervencion']}" ?></td>
                        <td><?php if ($dato['NivelRiesgoIntervencion'] <= 20) {
                                echo "IV";
                            } elseif ($dato['NivelRiesgoIntervencion'] <= 120) {
                                echo "III";
                            } elseif ($dato['NivelRiesgoIntervencion'] <= 500) {
                                echo "II";
                            } elseif ($dato['NivelRiesgoIntervencion'] <= 4000) {
                                echo "I";
                            } ?>
                        </td>
                        <td class="valoracion_riesgo">
                            <?php if ($dato['NivelRiesgoIntervencion'] <= 20) {
                                echo "ACEPTABLE";
                            } elseif ($dato['NivelRiesgoIntervencion'] <= 120) {
                                echo "MEJORABLE";
                            } elseif ($dato['NivelRiesgoIntervencion'] <= 500) {
                                echo "ACEPTABLE CON CONTROL ESPECIFICO";
                            } elseif ($dato['NivelRiesgoIntervencion'] <= 4000) {
                                echo "NO ACEPTABLE";
                            } ?>
                        </td>
                        <td><?php echo "{$dato['MiEliminacion']}" ?></td>
                        <td><?php echo "{$dato['MiSustitucion']}" ?></td>
                        <td><?php echo "{$dato['MiControlIngenieria']}" ?></td>
                        <td><?php echo "{$dato['MiControlAdministrativo']}" ?></td>
                        <td><?php echo "{$dato['elemento']}" ?></td>
                        <td><?php echo "{$dato['Estado']}" ?></td>
                    </tr>
                <?php
                }
                ?>

            </tbody>

        </table>

    </div>




    <script>
        //??? NO ME DEJA FILTRAR LOS CAMPOS EN LA TABLA Y ME JUSTIFICA EL TEXTO
        //Datatable
        // Inicializa DataTables en la tabla con el idioma español
        $(document).ready(function() {
            $('#tabla_matriz').DataTable({
                "language": {
        
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad",
                        "collection": "Colección",
                        "colvisRestore": "Restaurar visibilidad",
                        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                        "copySuccess": {
                            "1": "Copiada 1 fila al portapapeles",
                            "_": "Copiadas %ds fila al portapapeles"
                        },
                        "copyTitle": "Copiar al portapapeles",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Mostrar todas las filas",
                            "_": "Mostrar %d filas"
                        },
                        "pdf": "PDF",
                        "print": "Imprimir",
                        "renameState": "Cambiar nombre",
                        "updateState": "Actualizar",
                        "createState": "Crear Estado",
                        "removeAllStates": "Remover Estados",
                        "removeState": "Remover",
                        "savedStates": "Estados Guardados",
                        "stateRestore": "Estado %d"
                    },
                    "autoFill": {
                        "cancel": "Cancelar",
                        "fill": "Rellene todas las celdas con <i>%d<\/i>",
                        "fillHorizontal": "Rellenar celdas horizontalmente",
                        "fillVertical": "Rellenar celdas verticalmente"
                    },
                    "decimal": ",",
                    "searchBuilder": {
                        "add": "Añadir condición",
                        "button": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "clearAll": "Borrar todo",
                        "condition": "Condición",
                        "conditions": {
                            "date": {
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vacío",
                                "equals": "Igual a",
                                "notBetween": "No entre",
                                "not": "Diferente de",
                                "after": "Después",
                                "notEmpty": "No Vacío"
                            },
                            "number": {
                                "between": "Entre",
                                "equals": "Igual a",
                                "gt": "Mayor a",
                                "gte": "Mayor o igual a",
                                "lt": "Menor que",
                                "lte": "Menor o igual que",
                                "notBetween": "No entre",
                                "notEmpty": "No vacío",
                                "not": "Diferente de",
                                "empty": "Vacío"
                            },
                            "string": {
                                "contains": "Contiene",
                                "empty": "Vacío",
                                "endsWith": "Termina en",
                                "equals": "Igual a",
                                "startsWith": "Empieza con",
                                "not": "Diferente de",
                                "notContains": "No Contiene",
                                "notStartsWith": "No empieza con",
                                "notEndsWith": "No termina con",
                                "notEmpty": "No Vacío"
                            },
                            "array": {
                                "not": "Diferente de",
                                "equals": "Igual",
                                "empty": "Vacío",
                                "contains": "Contiene",
                                "notEmpty": "No Vacío",
                                "without": "Sin"
                            }
                        },
                        "data": "Data",
                        "deleteTitle": "Eliminar regla de filtrado",
                        "leftTitle": "Criterios anulados",
                        "logicAnd": "Y",
                        "logicOr": "O",
                        "rightTitle": "Criterios de sangría",
                        "title": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Borrar todo",
                        "collapse": {
                            "0": "Paneles de búsqueda",
                            "_": "Paneles de búsqueda (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Sin paneles de búsqueda",
                        "loadMessage": "Cargando paneles de búsqueda",
                        "title": "Filtros Activos - %d",
                        "showMessage": "Mostrar Todo",
                        "collapseMessage": "Colapsar Todo"
                    },
                    "select": {
                        "cells": {
                            "1": "1 celda seleccionada",
                            "_": "%d celdas seleccionadas"
                        },
                        "columns": {
                            "1": "1 columna seleccionada",
                            "_": "%d columnas seleccionadas"
                        },
                        "rows": {
                            "1": "1 fila seleccionada",
                            "_": "%d filas seleccionadas"
                        }
                    },
                    "thousands": ".",
                    "datetime": {
                        "previous": "Anterior",
                        "hours": "Horas",
                        "minutes": "Minutos",
                        "seconds": "Segundos",
                        "unknown": "-",
                        "amPm": [
                            "AM",
                            "PM"
                        ],
                        "months": {
                            "0": "Enero",
                            "1": "Febrero",
                            "10": "Noviembre",
                            "11": "Diciembre",
                            "2": "Marzo",
                            "3": "Abril",
                            "4": "Mayo",
                            "5": "Junio",
                            "6": "Julio",
                            "7": "Agosto",
                            "8": "Septiembre",
                            "9": "Octubre"
                        },
                        "weekdays": {
                            "0": "Dom",
                            "1": "Lun",
                            "2": "Mar",
                            "4": "Jue",
                            "5": "Vie",
                            "3": "Mié",
                            "6": "Sáb"
                        },
                        "next": "Próximo"
                    },
                    "editor": {
                        "close": "Cerrar",
                        "create": {
                            "button": "Nuevo",
                            "title": "Crear Nuevo Registro",
                            "submit": "Crear"
                        },
                        "edit": {
                            "button": "Editar",
                            "title": "Editar Registro",
                            "submit": "Actualizar"
                        },
                        "remove": {
                            "button": "Eliminar",
                            "title": "Eliminar Registro",
                            "submit": "Eliminar",
                            "confirm": {
                                "_": "¿Está seguro de que desea eliminar %d filas?",
                                "1": "¿Está seguro de que desea eliminar 1 fila?"
                            }
                        },
                        "error": {
                            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                        },
                        "multi": {
                            "title": "Múltiples Valores",
                            "restore": "Deshacer Cambios",
                            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
                            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, haga clic o pulse aquí, de lo contrario conservarán sus valores individuales."
                        }
                    },
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "stateRestore": {
                        "creationModal": {
                            "button": "Crear",
                            "name": "Nombre:",
                            "order": "Clasificación",
                            "paging": "Paginación",
                            "select": "Seleccionar",
                            "columns": {
                                "search": "Búsqueda de Columna",
                                "visible": "Visibilidad de Columna"
                            },
                            "title": "Crear Nuevo Estado",
                            "toggleLabel": "Incluir:",
                            "scroller": "Posición de desplazamiento",
                            "search": "Búsqueda",
                            "searchBuilder": "Búsqueda avanzada"
                        },
                        "removeJoiner": "y",
                        "removeSubmit": "Eliminar",
                        "renameButton": "Cambiar Nombre",
                        "duplicateError": "Ya existe un Estado con este nombre.",
                        "emptyStates": "No hay Estados guardados",
                        "removeTitle": "Remover Estado",
                        "renameTitle": "Cambiar Nombre Estado",
                        "emptyError": "El nombre no puede estar vacío.",
                        "removeConfirm": "¿Seguro que quiere eliminar %s?",
                        "removeError": "Error al eliminar el Estado",
                        "renameLabel": "Nuevo nombre para %s:"
                    },
                    "infoThousands": "."
                } 
            });
        });
    </script>

    <script>
        // Función para cambiar el color de la celda según el texto
        function cambiarColorCelda() {
            const intervenciones = document.querySelectorAll(".intervencion"); //Esta constante guarta la consulta de la clase
            const valoracion_riesgo = document.querySelectorAll(".valoracion_riesgo"); //Esta constante guarta la consulta de la clase
            intervenciones.forEach(celda => {
                const texto = celda.textContent.trim(); //Guatda el texto sin espacios al inicio y al final
                switch (texto) {
                    case "BAJO":
                        celda.style.backgroundColor = "yellow";
                        break;
                    case "MEDIO":
                        celda.style.backgroundColor = "orange";
                        break;
                    case "ALTO":
                        celda.style.backgroundColor = "red";
                        break;
                    case "MUY ALTO":
                        celda.style.backgroundColor = "red";
                        break;
                    default:
                        celda.style.backgroundColor = "white";
                        break;
                }
            })
            valoracion_riesgo.forEach(celda => {
                const texto = celda.textContent.trim(); //Guatda el texto sin espacios al inicio y al final
                switch (texto) {
                    case "ACEPTABLE":
                        celda.style.backgroundColor = "green";
                        break;
                    case "MEJORABLE":
                        celda.style.backgroundColor = "yellow";
                        break;
                    case "ACEPTABLE CON CONTROL ESPECIFICO":
                        celda.style.backgroundColor = "orange";
                        break;
                    case "NO ACEPTABLE":
                        celda.style.backgroundColor = "red";
                        break;
                    default:
                        celda.style.backgroundColor = "white";
                        break;
                }
            })

        };
        // Llama a la función al cargar la página o cuando cambie el contenido
        window.onload = cambiarColorCelda;
    </script>


</body>

</html>