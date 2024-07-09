<?php

//PENDIENTES: Colores de celdas de calculos, lo de EPP y la analística. Ajustar la letra a los placeholder

include ('conexion.php');

$query ="SELECT 
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
es.Nombre AS 'Estado'
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
tblestado AS es ON mp.Estado = es.Codigo";


$resultado = $con->query($query)//$resultado guarda la consulta 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matriz</title>
    <?php
    include('vistas/custom_header.html');
    include ('vistas/table_header.html');
    ?>
</head>

<body>
  <?php include ('vistas/nav.php'); ?>
  <div class="container-fluid">

    <div class="m-2">
        <table id="tabla_matriz" class="table table-bordered border-primary align-middle text-center table-striped">
            <thead class="table-primary text-nowrap ">
                <tr>
                    <th colspan="30">
                        <h1>IDENTIFICACIÓN DE PELIGROS, EVALUACIÓN Y VALORACIÓN DE RIESGOS - GTC-45</h1< /th>
                </tr>
                <tr>
                    <th colspan="8">Información de la labor
                    </th>
                    <th colspan="5">
                        Información del peligro
                    </th>
                    <th colspan="3">
                       Controles existentes
                    </th>
                    <th colspan="7">
                       Evaluación de riesgo
                    </th>
                    <th colspan="1">
                       Valoración del riesgo
                    </th>
                    <th colspan="6">
                       Medidas de intervención
                    </th>
                </tr>
                <tr>
                    <th>
                       Código
                    </th>
                    <th>
                       Fecha
                    </th>
                    <th>
                       Proceso
                    </th>
                    <th>
                       Zona/Lugar
                    </th>
                    <th>
                       Actividad
                    </th>
                    <th>
                       Tarea
                    </th>
                    <th>
                       ¿La tarea es rutinaria?
                    </th>
                    <th>
                       Cargo
                    </th>
                    <th>
                       Clasificación
                    </th>
                    <th>
                       Descripción
                    </th>
                    <th>
                       Detalle
                    </th>
                    <th>
                       Efectos posibles
                    </th>
                    <th>
                       Número de expuestos
                    </th>
                    <th>
                       Fuente
                    </th>
                    <th>
                       Medio
                    </th>
                    <th>
                       Individuo
                    </th>
                    <th>
                       NivelDeficiencia
                    </th>
                    <th>
                       Nivel de exposición
                    </th>
                    <th>
                       Nivel de probabilidad
                    </th>
                    <th>
                       Interpretación nivel de probabilidad
                    </th>
                    <th>
                       Nivel de consecuencia
                    </th>
                    <th>
                       Nivel de riesgo e intervención
                    </th>
                    <th>
                       Interpretación del nivel de riesgo
                    </th>
                    <th>
                       Aceptabilidad Del Riesgo
                    </th>
                    <th>
                       Eliminación
                    </th>
                    <th>
                       Sustitución
                    </th>
                    <th>
                       Controles de ingeniería
                    </th>
                    <th>
                       Controles administrativos, señalización, advertencia
                    </th>
                    <th>
                       Equipo y/o Elementos de protección personal
                    </th>
                    <th>
                       Estado
                    </th>
                </tr>
            </thead>
  
            <tbody>
  
  
                <?php
                //muestra datos en tabla 
                while ($dato = $resultado->fetch_assoc()) {
                    ?>
  
                    <tr>
                        <td><?php echo "{$dato['Codigo']}" ?></td>
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
                        <td><?php echo "{$dato['Equipo y/o Elementos de protección personal']}" ?></td>
                        <td><?php echo "{$dato['Estado']}" ?></td>
                    </tr>
                    <?php
                }
                ?>
  
            </tbody>
  
        </table>
    </div>
  </div>


    <script>
        //ESTE SCRIPT NO FUNCIONA
        // Función para cambiar el color de la celda según el texto
        function cambiarColorCelda() {
            const intervenciones = document.querySelectorAll(".intervencion"); //Esta constante guarta la consulta de la clase
            const valoracion_riesgo = document.querySelectorAll(".valoracion_riesgo");//Esta constante guarta la consulta de la clase
            intervenciones.forEach(celda => {
                const texto = celda.textContent.trim();//Guatda el texto sin espacios al inicio y al final
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
                const texto = celda.textContent.trim();//Guatda el texto sin espacios al inicio y al final
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

<?php
include('vistas/table_script.html');
?>
</body>

</html>