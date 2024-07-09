<?php
// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include('conexion.php');

    // Obtener los datos del formulario
    $tarea = $_POST['Tarea'];
    $zonaLugar = $_POST['Zona'];
    $cargo = $_POST['Cargo'];
    $rutinario = $_POST['Rutinario'];
    $clasificacion = $_POST['clasificacion'];
    $descripcion = $_POST['descripcion'];
    $detallePeligro = $_POST['DetallePeligro'];
    $efectosPosibles = $_POST['EfectosPosibles'];
    $controlFuente = $_POST['ControlFuente'];
    $controlMedio = $_POST['ControlMedio'];
    $controlIndividuo = $_POST['ControlIndividuo'];
    $numeroExpuesto = $_POST['NumeroExpuesto'];
    $nivelDeficiencia = $_POST['niveldeficiencia'];
    $nivelExposicion = $_POST['nivelexposicion'];
    $nivelConsecuencia = $_POST['nivelconsecuencia'];
    $miEliminacion = $_POST['MiEliminacion'];
    $miSustitucion = $_POST['MiSustitucion'];
    $miControlIngenieria = $_POST['MiControlIngenieria'];
    $miControlAdministrativo = $_POST['MiControlAdministrativo'];
    $elemento_seleccionado = $_POST['elementosproteccionpersonal'];

    var_dump($_POST['elementosproteccionpersonal']);//Confima que si se envíe

    //Esto es para ver si funciona
echo "Tarea: " . $tarea . "<br>";
echo "Zona/Lugar: " . $zonaLugar . "<br>";
echo "Cargo: " . $cargo . "<br>";
echo "¿La tarea es rutinaria?: " . $rutinario . "<br>";
echo "Clasificación del peligro: " . $clasificacion . "<br>";
echo "Descripción del peligro: " . $descripcion . "<br>";
echo "Detalle del peligro: " . $detallePeligro . "<br>";
echo "Efectos posibles: " . $efectosPosibles . "<br>";
echo "Control en la fuente: " . $controlFuente . "<br>";
echo "Control en el medio: " . $controlMedio . "<br>";
echo "Control en el individuo: " . $controlIndividuo . "<br>";
echo "Número de expuestos: " . $numeroExpuesto . "<br>";
echo "Nivel de deficiencia: " . $nivelDeficiencia . "<br>";
echo "Nivel de exposición: " . $nivelExposicion . "<br>";
echo "Nivel de consecuencia: " . $nivelConsecuencia . "<br>";
echo "Eliminación: " . $miEliminacion . "<br>";
echo "Sustitución: " . $miSustitucion . "<br>";
echo "Controles de ingeniería: " . $miControlIngenieria . "<br>";
echo "Controles administrativos: " . $miControlAdministrativo . "<br>";
    
    // Insertar los datos en la base de datos
    $query = "INSERT INTO tblmatrizpeligros (Usuario, Fecha, Tarea, detallepeligro, ZonaLugar, Cargos, DescripcionPeligro, ControlFuente, ControlMedio, ControlIndividuo, NivelDeficiencia, NivelExposicion, NivelConsecuencia, NumeroExpuesto, EfectosPosibles, MiEliminacion, MiSustitucion, MiControlIngenieria, MiControlAdministrativo, Estado) 
    VALUES (39457318, now(), '$tarea', '$detallePeligro', '$zonaLugar', '$cargo', '$descripcion', '$controlFuente', '$controlMedio', '$controlIndividuo', '$nivelDeficiencia', '$nivelExposicion', '$nivelConsecuencia', '$numeroExpuesto', '$efectosPosibles', '$miEliminacion', '$miSustitucion', '$miControlIngenieria', '$miControlAdministrativo', 2)";

    // Ejecutar la consulta
    if ($con->query($query) === TRUE) {
        echo "Los datos se han guardado correctamente.";
        $id_matriz_peligros = $con->insert_id;
        echo "$id_matriz_peligros";
        // Redirigir a la página deseada después de guardar los datos
       foreach($elemento_seleccionado as $elemento){
        $consulta = "INSERT INTO tbleppmatrizpeligros (CodigoElementosProteccionPersonal, CodigoMatrizPeligros) VALUES ($elemento, $id_matriz_peligros)"; $con->query($consulta);

       }
        exit();
    } else {
        echo "Error al guardar los datos: " . $con->error;
    }

    // Cerrar la conexión a la base de datos
    $con->close();
} else {
    // Si no se recibieron datos por el método POST, redirigir a la página del formulario
    
    exit();
}
?>