<?php
include 'conexion.php';
// Obtener la clasificación del peligro seleccionada desde la solicitud Ajax
$clasificacion_seleccionada = $_GET['clasificacion'];

// Consulta para obtener las descripciones relacionadas con la clasificación seleccionada
$sql = "SELECT Codigo, Nombre FROM tbldescripcionpeligro WHERE Clasificacion IN (SELECT Codigo FROM tblclasificacionpeligro WHERE Codigo = $clasificacion_seleccionada)";
$result = $con->query($sql);

// Crear un array con los resultados
$descripciones = array();
while ($row = $result->fetch_assoc()) {
    $descripciones[] = $row;
}

// Devolver los resultados como JSON
echo json_encode($descripciones);
$con->close();
?>