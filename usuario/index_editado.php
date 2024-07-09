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

//PÉNDIENTE HACER VENTANA MODAL LUEGO DE GUARDAR, QUE LE DA LA OPCIÓN DE REPORTAR OTRO PELIGRO O IR A LA MATRIZ
//En los colapsables les hice row y cada row un col, pero en la parte de la labor y evaluación del riesgo se desconfigura el tamaño, no entiendo porqué

include "conexion.php";

$Tarea_con = $con->query('SELECT * FROM tbltarea'); #Hace la consulta a la base de datos
$Zona_con = $con->query('SELECT * FROM tblzonalugar'); #Hace la consulta a la base de datos
$Cargo_con = $con->query('SELECT * FROM tblcargos'); #Hace la consulta a la base de datos
$Clasificacion_con = $con->query('SELECT * FROM tblclasificacionpeligro'); #Hace la consulta a la base de datos
$NivelDeficiencia_con = $con->query('SELECT * FROM tblniveldeficiencia'); #Hace la consulta a la base de datos
$NivelExposicion_con = $con->query('SELECT * FROM tblnivelexposicion'); #Hace la consulta a la base de datos
$NivelConsecuencia_con = $con->query('SELECT * FROM tblnivelconsecuencia'); #Hace la consulta a la base de datos
$epp_con = $con->query('SELECT * FROM tblelementosproteccionpersonal');

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- enlace a la página de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style_formulario.css">

    <title>Formularios</title>
    <?php
    include('vistas/script.php');
    ?>
</head>

<body class="m-0 vh-100 row justify-content-center align-items-center  bg-info-subtle">
    <?php
    include('vistas/nav1.php');
    ?>

    <div class="mx-auto text-dark" style="width:1000px;">
        <h1 class="$lead-font-weight:300 text-center">Reporte de peligros</h1>
        <br>
        <p class="lead text-dark text-center">A continuación encontrarás cinco módulos, la mayoría de ellos en
            listas desplegables, que facilitaran el registro de la información, te invitamos a recorrer cada uno de
            ellos e ingresar los datos que allí se te piden:</p>
    </div>

    <div class="container d-flex justify-content-center align-items-center p-3 mb-2 text-info-emphasis">
        <!-- la clase "validacion" y el novalidate es para validar que si se llenen los formularios -->
        <form class="validacion" action="guardar.php" method="POST" id="miFormulario" novalidate>

            <!-- colapsable 1  -->
            <div class="row m-3 d-flex justify-content-center">
                <div class="col-12">
                    <button type=" button" class="btn btn-primary btn-lg " data-bs-target="#collapse-1" data-bs-toggle="collapse" aria-expanded="false" aria-controls="colapse-1">
                        <h2>1. Información de la labor</h2>
                    </button>

                    <div class="collapse" id="collapse-1">
                        <!-- Informacion de la labor  -->
                        <br>
                        <div class="form-group" class="card card body">
                            <label class="form-label" for="tarea">Tarea:</label>
                            <select class="form-control" id="Tarea" name="Tarea" required>
                                <option disabled selected value="">Seleccione una tarea</option>
                                <?php
                                while ($Tarea_fi = $Tarea_con->fetch_assoc()) { //$Tarea_busca en la base de datos las tareas, fetch_assoc recorre la consulta y la vuelve un vector y $Tarea_fi la guarda.
                                ?>
                                    <!-- value da un valor interno a la opcion -->
                                    <option value="<?php echo $Tarea_fi['Codigo'] ?>">
                                        <?php echo $Tarea_fi['Nombre'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                            <!-- Validación -->
                            <div class="valid-feedback">
                                ¡Correcto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor elija una opción.
                            </div>
                        </div>
                       


                        <div class="form-group">
                            <label class="form-label" for="zonaLugar">Zona/lugar:</label>
                            <select class="form-control" id="Zona" name="Zona" required>
                                <option disabled selected value="">Seleccione zona/lugar</option>
                                <?php
                                while ($Zona_fi = $Zona_con->fetch_assoc()) { //$Tarea_busca en la base de datos las tareas, fetch_assoc recorre la consulta y la vuelve un vecto y $Tarea_fi la guarda.
                                ?>
                                    <!-- value da un valor interno a la opcion -->
                                    <option value="<?php echo $Zona_fi['Codigo'] ?>">
                                        <?php echo $Zona_fi['Nombre'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                            <!-- Validación -->
                            <div class="valid-feedback">
                                ¡Correcto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor elija una opción.
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="form-label" for="cargo">Cargo:</label>
                            <select class="form-control" id="Cargo" name="Cargo" required>
                                <option disabled selected value="">Seleccione el cargo</option>
                                <?php
                                while ($Cargo_fi = $Cargo_con->fetch_assoc()) { //$Tarea_busca en la base de datos las tareas, fetch_assoc recorre la consulta y la vuelve un vecto y $Tarea_fi la guarda.
                                ?>
                                    <!-- value da un valor interno a la opcion -->
                                    <option value="<?php echo $Cargo_fi['Codigo'] ?>">
                                        <?php echo $Cargo_fi['Nombre'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                            <!-- Validación -->
                            <div class="valid-feedback">
                                ¡Correcto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor elija una opción.
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="form-label">¿La tarea es rutinaria?:</label>
                            <div class="form-check form-check-inline m-2">
                                <input class="form-check-input" type="radio" name="Rutinario" id="opcion1" value="1">
                                <label class="form-check-label" for="si">Si</label>
                            </div>
                            <div class="form-check form-check-inline m-2">
                                <input class="form-check-input" type="radio" name="Rutinario" id="opcion2" value="0" checked>
                                <label class="form-check-label" for="no">No</label>
                            </div>
                            
                        </div>
                    </div>
                    <br>
                </div>
            </div>

            <div class="row m-3 d-flex  justify-content-center">
                <div class="col-12">
                    <!-- colapsable 2 -->
                    <button type="button" class="btn btn-primary btn-lg" data-bs-target="#collapse-2" data-bs-toggle="collapse" aria-expanded="false" aria-controls="colapse-2">
                        <h2>2.Información del peligro</h2>
                    </button>
                    <div class="collapse" id="collapse-2">
                        <!-- información del peligro listas desplegables -->
                        <div class="form-group" class="card card body">
                            <br>
                            <label class="form-label" for="clasificacion">Clasificación del peligro:</label>
                            <select class="form-control" id="clasificacion" name="clasificacion" onchange="cargarDescripciones()" required>
                                <option disabled selected value="">Seleccione la clasificación del peligro</option>
                                <?php
                                while ($Clasificacion_fi = $Clasificacion_con->fetch_assoc()) { //$Tarea_busca en la base de datos las tareas, fetch_assoc recorre la consulta y la vuelve un vecto y $Tarea_fi la guarda.
                                ?>
                                    <!-- value da un valor interno a la opcion -->
                                    <option value="<?php echo $Clasificacion_fi['Codigo'] ?>">
                                        <?php echo $Clasificacion_fi['Nombre'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                            <!-- Validación -->
                            <div class="valid-feedback">
                                ¡Correcto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor elija una opción.
                            </div>
                        </div>
                        <div class="descripcion-peligro">
                            <label for="descripcion" class="form-label"placeholder="Seleccione la descripción del peligro: ">Descripción de Peligro:</label>
                            
                            <select name="descripcion" id="descripcion" class=" form-control">
                            <option disabled selected value="">Seleccione la descripción del peligro:</option>
                                <!-- Las opciones se cargarán dinámicamente con JavaScript -->
                            </select>
                            <!-- Validación -->
                            <div class="valid-feedback">
                                ¡Correcto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor elija una opción.
                            </div>
                        </div>

                        <!-- Detalle y efectos: digitar -->
                        <div class="form-group">
                            <label class="form-label" for="efectos">Relacione a continuación el detalle del peligro:
                            </label>
                            <input type="text" class="form-control" placeholder="Digite el detalle del peligro" id="DetallePeligro" name="DetallePeligro" required>
                            <!-- Validación -->
                            <div class="valid-feedback">
                                ¡Correcto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor digite el detalle del peligro.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="efectos">Relacione a continuación los efectos posibles:
                            </label>
                            <input type="text" class="form-control" list="datalistOptions1" placeholder="Digite los efectos posibles" id="EfectosPosibles" name="EfectosPosibles" required>
                            <datalist id="datalistOptions1">
                                <option value="Infecciones respiratorias.">
                                <option value="Problemas auditivos">
                                <option value="Problemas respiratorios / Pulmonares.">
                                <option value="Estrés.">
                                <option value="Problemas osteomusculares.">
                                <option value="Golpes o contusiones.">
                                <option value="Heridas.">
                                <option value="Esguinces, luxaciones o fracturas.">
                                <option value="Amputaciones.">
                                <option value="Quemaduras.">
                                <option value="Muerte.">
                            </datalist>
                            <!-- Validación -->
                            <div class="valid-feedback">
                                ¡Correcto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor digite los efectos posibles.
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>

            <div class="row m-3 d-flex  justify-content-center">
                <div class="col-12">
                    <!-- colapsable 3 -->
                    <button type="button" class="btn btn-primary btn-lg" data-bs-target="#collapse-3" data-bs-toggle="collapse" aria-expanded="false" aria-controls="colapse-3">
                        <h2>&nbsp;&nbsp;&nbsp;3.Controles existentes&nbsp;&nbsp;&nbsp;</h2>
                    </button>
                    <!-- 3. Controles existentes -->
                    <div class="collapse" id="collapse-3">
                        <br>
                         <!-- POPOVER -->
                        <div class="form-group" class="card card body">
                            <a type="button" role="button" tabindex="0" class="text-dark" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="right" data-bs-custom-class="custom-popover" data-bs-title="Especificaciones:" data-bs-content="Medidas de control que se establecen en la fuente generadora del riesgo. Por ejemplo: Tapar un hueco."> 
                                <span class="material-icons">
                                    quiz
                                </span>
                            </a>
                            <label class="form-label" for="control_fuente">Controles en la Fuente:</label>
                           
                            <!-- DATALIST -->
                            <input type="text" class="form-control" list="datalistOptions2" id="ControlFuente" name="ControlFuente" placeholder="Digite los controles en la fuente" />
                            <datalist id="datalistOptions2">
                                <option value="Se usan sustancias químicas no cancerígenas y de bajo riesgo.">
                                <option value="Máquinas con guardas de seguridad para las partes en movimiento de la máquina.">
                                <option value="Matenimiento de máquinas o equipos.">
                                <option value="Mantenimiento de superficies.">
                                <option value="Matenimiento a instalaciones eléctricas.">
                                <option value="Se tienen sillas ergonómicas.">
                            </datalist>
                            <!-- POPOVER -->
                            <a type="button" role="button" tabindex="0" class="text-dark" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="right" data-bs-custom-class="custom-popover" data-bs-title="Especificaciones:" data-bs-content="Medidas de control que se establecen entre la fuente y las personas. Por ejemplo: El uso de ayudas mecánicas para mover objetos pesados.">
                                <span class="material-icons">
                                    quiz
                                </span>
                            </a>
                            <label class="form-label" for="control_medio">Controles en el Medio:</label>
                            
                            <!-- DATALIST -->
                            <input type="text" class="form-control" list="datalistOptions3" id="ControlMedio" name="ControlMedio" placeholder="Digite los controles en el medio" />
                            <datalist id="datalistOptions3">
                                <option value="Fuente generadora de ruido aislada.">
                                <option value="Ventilación en la zona instalada.">
                                <option value="Disponibilidad de ayudas mecánicas para mover objetos pesados.">
                                <option value="Extractores de gases químicos instalados.">
                                <option value="Mamparas Instaladas.">
                            </datalist>
                             <!-- POPOVER -->
                             <a type="button" role="button" tabindex="0" class="text-dark" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="right" data-bs-custom-class="custom-popover" data-bs-title="Especificaciones:" data-bs-content="Medidas de control que aplican en las personas. Por ejemplo: Limitación del tiempo de exposición al riesgo, formación.">
                                <span class="material-icons">
                                    quiz
                                </span>
                            </a>
                            <label class="form-label" for="control_individuo">Controles en el Individuo:</label>
                           
                            <!-- DATALIST -->
                            <input type="text" class="form-control" list="datalistOptions4" id="ControlIndividuo" name="ControlIndividuo" placeholder="Digite los controles en el individuo" />
                            <datalist id="datalistOptions4">
                                <option value="Se Limita el tiempo de exposición al riesgo por parte del empelado.">
                                <option value="Se da inducción, reinducción, entrenamiento y reentrenamiento.">
                                <option value="Se da formación en prevención de riesgos y demás.">
                                <option value="Se hacen evaluaciones médicas ocupacionales.">
                                <option value="Se da dotación y Elementos de Protección Personal para la labor.">
                            </datalist>

                            <label class="form-label" for="expuestos">Relacione el número de expuestos:</label>
                            <input type="number" class="form-control" id="NumeroExpuesto" name="NumeroExpuesto" placeholder="Indique la cantidad de afectados" />
                        </div>
                        <br>
                    </div>
                </div>
            </div>

            <div class="row m-3 d-flex justify-content-center">
                <div class="col-12">
                    <!-- colapsable 4 -->
                    <button type="button" class="btn btn-primary btn-lg" data-bs-target="#collapse-4" data-bs-toggle="collapse" aria-expanded="false" aria-controls="colapse-4">
                        <h2>&nbsp;&nbsp;4.Evaluación del riesgo&nbsp;&nbsp;</h2>
                    </button>
                    <!-- 4. Evaluación del riesgo -->
                    <div class="collapse" id="collapse-4">
                        <br>
                        <div class="form-group" class="card card body">
                        <!-- POPOVER -->
                        <a type="button" role="button" tabindex="0" class="text-dark" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="right" data-bs-custom-class="custom-popover" data-bs-title="Especificaciones:" data-bs-content="MUY ALTO-10: Se ha (n) detectado peligro (s) que determina(n) como posible la generación de incidentes o la eficacia del conjunto de medidas preventivas existentes respecto al riesgo es nula o no existe, o ambos.&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        ALTO-6: Se ha (n) detectada algún (os) peligro (s) que pueden dar lugar a incidentes significativa(s), o la eficacia del conjunto de medidas preventivas existentes es moderada, o ambos.&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        MEDIO-2: Se han detectado peligros que pueden dar lugar a incidentes poco significativas o de menor importancia, o la eficacia del conjunto de medidas preventivas existentes es moderada, o ambas.&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        BAJO-0: No se ha detectado peligro o la eficacia del conjunto de medidas preventivas existentes es alta, o ambas. El riesgo está controlado.  Estos peligros se clasifican directamente en el nivel de riesgo y de intervención cuatro (IV)
                            ">   
                            <span class="material-icons">
                                    quiz
                            </span>
                            </a>    
                        <label class="form-label" for="nivel_deficiencia">Nivel de deficiencia:</label>
                            
                            <!-- DATALIST -->

                            <select class="form-control" id="niveldeficiencia" name="niveldeficiencia" required>
                                <option disabled selected value="">Seleccione el nivel de deficiencia</option>
                                <?php
                                while ($NivelDeficiencia_fi = $NivelDeficiencia_con->fetch_assoc()) { //$Tarea_busca en la base de datos las tareas, fetch_assoc recorre la consulta y la vuelve un vecto y $Tarea_fi la guarda.
                                ?>
                                    <!-- value da un valor interno a la opcion -->
                                    <option value="<?php echo $NivelDeficiencia_fi['ValorNivelDeficiencia'] ?>">
                                        <?php echo $NivelDeficiencia_fi['ValorNivelDeficiencia'] . "." . $NivelDeficiencia_fi['Nombre'] /*. ":" . $NivelDeficiencia_fi['Significado'] */ ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                             <!-- Validación -->
                             <div class="valid-feedback">
                                ¡Correcto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor elija una opción.
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- POPOVER -->
                            <a type="button" role="button" tabindex="0" class="text-dark" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="right" data-bs-custom-class="custom-popover" data-bs-title="Especificaciones:" data-bs-content="
                            ESPORÁDICA-1:La situación de exposición se presenta de manera eventual.&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp            
                            OCASIONAL-2:La situación de exposición se presenta alguna vez durante la jornada laboral y por un período de tiempo corto.&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp           
                            FRECUENTE-3:La situación de exposición se presenta varias veces durante la jornada laboral por tiempos cortos.&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp            
                            CONTINUA-4: La situación de exposición se presenta sin interrupción o varias veces con tiempo prolongado durante la jornada laboral.                           
                            ">
                            <span class="material-icons">
                                    quiz
                            </span>
                            </a>
                            <label class="form-label" for="nivel_exposicion">Nivel de exposición:</label>
                            
                            <!-- DATALIST -->
                            <select class="form-control" id="nivelexposicion" name="nivelexposicion" required>
                                <option disabled selected value="">Seleccione el nivel de exposición</option>
                                <?php
                                while ($NivelExposicion_fi = $NivelExposicion_con->fetch_assoc()) {
                                ?>
                                    <!-- value da un valor interno a la opcion -->
                                    <option value="<?php echo $NivelExposicion_fi['ValorNivelExposicion'] ?>">
                                        <?php echo $NivelExposicion_fi['ValorNivelExposicion'] . "." . $NivelExposicion_fi['Nombre'] /*. ":" . $NivelExposicion_fi['Significado']*/ ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                             <!-- Validación -->
                             <div class="valid-feedback">
                                ¡Correcto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor elija una opción.
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- POPOVER -->
                            <a type="button" role="button" tabindex="0" class="text-dark" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="right" data-bs-custom-class="custom-popover" data-bs-title="Especificaciones:" data-bs-content="
                            LEVE-10: Lesiones o enfermedades que no requieren incapacidad.&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            GRAVE-25: Lesiones o enfermedades con incapacidad laboral temporal. &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            MUY GRAVE-60:Lesiones o enfermedades graves irreparables (incapacidad permanente parcial o invalidez).&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            MORTAL O CATASTRÓFICO-100: Muerte (s).
                            ">
                            <span class="material-icons">
                                    quiz
                            </span>
                            </a>
                            <label class="form-label" for="nivel_consecuencia">Nivel de consecuencia:</label>
                            
                            <!-- DATALIST -->
                            <select class="form-control" id="nivelconsecuencia" name="nivelconsecuencia" required>
                                <option disabled selected value="">Selecciona el nivel de consecuencia</option>
                                <?php
                                while ($NivelConsecuencia_fi = $NivelConsecuencia_con->fetch_assoc()) {
                                ?>
                                    <!-- value da un valor interno a la opcion -->
                                    <option value="<?php echo $NivelConsecuencia_fi['ValorNivelConsecuencia'] ?>">
                                        <?php echo $NivelConsecuencia_fi['ValorNivelConsecuencia'] . "." . $NivelConsecuencia_fi['Nombre'] /*. ":" . $NivelConsecuencia_fi['Significado']*/ ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                             <!-- Validación -->
                             <div class="valid-feedback">
                                ¡Correcto!
                            </div>
                            <div class="invalid-feedback">
                                Por favor elija una opción.
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-3 d-flex justify-content-center align-items-center">
                <div class="col-12">
                    <!-- colapsable 5 -->
                    <button type="button" class="btn btn-primary btn-lg" data-bs-target="#collapse-5" data-bs-toggle="collapse" aria-expanded="false" aria-controls="colapse-5">
                        <h2>5.Medidas de intervención</h2>
                    </button>

                    <!-- Medidas de intervención  -->

                    <div class="collapse" id="collapse-5">
                        <br>
                        <div class="form-group" class="card card body">
                            <!-- POPOVER -->
                            <a type="button" role="button" tabindex="0" class="text-dark" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="right" data-bs-custom-class="custom-popover" data-bs-title="Especificaciones:" data-bs-content="Medida que se toma para suprimir (hacer desaparecer) el peligro/riesgo.">
                                <span class="material-icons">
                                    quiz
                                </span>
                            </a>
                            <label class="form-label" for="eliminacion">Eliminación:</label>
                            
                            <!-- DATALIST -->
                            <input type="text" class="form-control" list="datalistOptions5" id="MiEliminacion" name="MiEliminacion" placeholder="Digite las medidas de eliminación">
                            <datalist id="datalistOptions5">
                                <option value="Cambiar silla por una ergonómica.">
                                <option value="Sistematizar un proceso.">
                                <option value="Mejorar un puesto de trabajo.">
                                <option value="Cambiar un proceso de manera que se elimine el riesgo.">
                            </datalist>
                            <!-- Textbox para ingresar medidas de sustitución -->
                              <!-- POPOVER -->
                            <a type="button" role="button" tabindex="0" class="text-dark" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="right" data-bs-custom-class="custom-popover" data-bs-title="Especificaciones:" data-bs-content="Medida que se toma a fin de reEmplazar un peligro por otro que no genere riesgo.">
                                <span class="material-icons">
                                    quiz
                                </span>
                            </a>
                            <label class="form-label" for="sustitucion">Sustitución: </label>
                           
                            <!-- DATALIST -->
                            <input type="text" class="form-control" id="MiSustitucion" name="MiSustitucion" placeholder="Digite las medidas de sustitución">
                             <!-- POPOVER -->
                             <a type="button" role="button" tabindex="0" class="text-dark" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="right" data-bs-custom-class="custom-popover" data-bs-title="Especificaciones:" data-bs-content="Medidas técnicas para el control del peligro/riesgo en su origen (fuente) o en el medio, tales como el confinamiento (encerramiento) de un  peligro o un proceso de trabajo, aislamiento de un proceso peligroso o del trabajador y la ventilación (general y localizada), entre otros).">
                                <span class="material-icons">
                                    quiz
                                </span>
                            </a>
                            <!-- Textbox para ingresar medidas de controles de ingenieria -->
                            <label class="form-label" for="control_ingenieria">Controles de ingeniería: </label>
                           
                            <!-- DATALIST -->
                            <input type="text" class="form-control" list="datalistOptions6" id="MiControlIngenieria" name="MiControlIngenieria" placeholder="Digite los controles de ingeniería">
                            <datalist id="datalistOptions6">
                                <option value="Instalar sistemas de ventilación.">
                                <option value="Aislamiento de trabajadores o materiales.">
                                <option value="Instalación de guardas de seguridad para partes en movimiento.">
                                <option value="Barandas de protección.">
                                <option value="Superficies antideslizantes.">
                                <option value="Construcción de espacios protegidos contra el ruido o la contaminación por gases.">
                            </datalist>
                            <!-- POPOVER -->
                            <a type="button" role="button" tabindex="0" class="text-dark" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="right" data-bs-custom-class="custom-popover" data-bs-title="Especificaciones:" data-bs-content="Medidas que tienen como fin reducir el tiempo de exposición al peligro, tales como la rotación de personal, cambios en la duración o tipo de la jornada de trabajo. Incluyen también la señalización, advertencia, demarcación de zonas de riesgo, implementación de sistemas de alarma, diseño e implementación de procedimientos y trabajos seguros, controles de acceso a áreas de riesgo, permisos de trabajo, entre otros">
                                <span class="material-icons">
                                    quiz
                                </span>
                            </a>
                            <!-- Textbox para ingresar medidas de controles administrativos-->
                            <label class="form-label" for="control_administrativo">Controles administrativos,
                                señalización, advertencia: </label>
                            
                            <!-- DATALIST -->
                            <input type="text" class="form-control" list="datalistOptions7" id="MiControlAdministrativo" name="MiControlAdministrativo" placeholder="Digite los controles administrativos">
                            <datalist id="datalistOptions7">
                                <option value="Formación">
                                <option value="Inducción / Reinducción / Entrenamiento / Reentrenamiento.">
                                <option value="Señalización y/o demarcación">
                                <option value="Procedimiento de seguridad.">
                                <option value="Inspecciones de seguridad.">
                                <option value="Rotación de personal.">
                                <option value="Cambios en la duración o tipo de la jornada de trabajo.">
                            </datalist>


                        </div>
                        <div class="form-group">
                            <label class="form-label" for="epp">Equipo y/o elementos de protección personal: </label>
                            <select class="form-select" multiple aria-label="epp" id="elementosproteccionpersonal" name="elementosproteccionpersonal[]" required>
                                <option selected>Seleccione el elemento de protección personal</option>
                                <?php
                                while ($epp_fi = $epp_con->fetch_assoc()) {
                                ?>
                                    <!-- value da un valor interno a la opcion -->
                                    <option value="<?php echo $epp_fi['Codigo'] ?>">
                                        <?php echo $epp_fi['Nombre'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                            <br>

                            <div class="d-flex justify-content-center align-items-center">
                                <input class="btn btn-primary btn-lg" type="submit" value="Guardar" id="guardar">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>




    <script>
        //El siguiente script es un sweetalert, una ventana modal que sale al querer guardar el formulario. 
        document.getElementById('guardar').addEventListener('click', function(event) {
            event.preventDefault(); // Evita que el formulario se envíe automáticamente
            // Muestra la confirmación con SweetAlert2
            Swal.fire({
                title: "¿Desea guardar los cambios?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Guardar",
                cancelButtonText: `Cancelar`,
                denyButtonText: `No guardar`
            }).then((result) => {
                /* Si se quiere guardar o no  */
                if (result.isConfirmed) {

                    Swal.fire("¡Cambios guardados!", "", "success").then(() => {
                        //Envía el formulario
                        // Aquí puedes enviar el formulario PILAS NO ME MUESTRA QUE SE GUARDARON LOS CAMBIOS
                        document.getElementById('miFormulario').submit();
                    });
                } else if (result.isDenied) {
                    Swal.fire("Los cambios no se guardaron", "", "info");
                }
            })
        });
    </script>


    <script>
        // El siguiente script me cierra un colapsable cuando le doy click al siguiente
        const colapsables = document.querySelectorAll('.collapse');
        colapsables.forEach((colapsable) => {
            colapsable.addEventListener('show.bs.collapse', (event) => {
                // Cerrar los demás colapsables cuando se abre uno
                colapsables.forEach((otherColapsable) => {
                    if (otherColapsable !== event.target) {
                        otherColapsable.classList.remove('show');
                    }
                });
            });
        });
    </script>

    <script>
        //El siguiente script me conecta las lista desplegable de clasificación con descripcion
        function cargarDescripciones() {
            var clasificacionSeleccionada = document.getElementById("clasificacion").value;
            var descripcionDropdown = document.getElementById("descripcion");
            // Limpiar opciones actuales
            descripcionDropdown.innerHTML = "";
            // Mostrar el dropdown solo si se selecciona una clasificación
            if (clasificacionSeleccionada !== "") {
                descripcionDropdown.style.display = "block";
                // Realizar solicitud Ajax para obtener las descripciones relacionadas
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Parsear la respuesta JSON y agregar opciones al dropdown de descripciones
                        var opciones = JSON.parse(this.responseText);
                        opciones.forEach(function(opcion) {
                            var option = document.createElement("option");
                            option.value = opcion.Codigo;
                            option.text = opcion.Nombre;
                            descripcionDropdown.appendChild(option);
                        });
                    }
                };
                xmlhttp.open("GET", "obtener_descripciones.php?clasificacion=" + clasificacionSeleccionada, true);
                xmlhttp.send();
            } else {
                // Ocultar el dropdown si no se selecciona ninguna clasificación
                descripcionDropdown.style.display = "none";
            }
        }
    </script>

    <script>
        //NO ESTÁ FUNCIONANDO???????
        //valida que en ciertos campos se hayan ingresado datos o elegido
        // JavaScript para deshabilitar el submit si hay campos inválidos
        (() => {
            'use strict'

            // seleccionar todos los formularios 
            const forms = document.querySelectorAll('.validacion')

            // Iterar sobre los formularios y prevenir su envio
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>


    <script>
        // Inicializar los popovers de Bootstrap
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
        const popover = new bootstrap.Popover('.popover-dismiss', {
            trigger: 'focus'
        })
    </script>



</body>

</html>