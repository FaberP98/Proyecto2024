<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analítica</title>
    <!-- jQuery CDN  -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <?php include('vistas/custom_header.html'); ?>
    <script src="../node_modules/chart.js/dist/chart.umd.js"></script> 
</head>
<body>
<?php include('vistas/nav.php'); 
    include('conexion.php');?>
    <!-- Chart Start -->
    <div class="container-fluid pt-4 px-4">

        
        <div class="row g-4">
            

            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Porcentaje(%) de tareas rutinarias</h6>
                    <canvas id="grfc_rutinarias"></canvas>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Single Line Chart</h6>
                    <canvas id="line-chart"></canvas>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Multiple Line Chart</h6>
                    <canvas id="salse-revenue"></canvas>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Total de peligros por proceso</h6>
                    <canvas id="bar-chart"></canvas>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Total de peligros por Zona</h6>
                    <canvas id="peligros_zona"></canvas>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Peligros no aceptables por tarea</h6>
                    <canvas id="grfc_peligros_no_aceptables_tarea"></canvas>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Peligros con control específico por tarea</h6>
                    <canvas id="grfc_peligros_control_tarea"></canvas>
                </div>
            </div>
        </div>
    </div>
    <?php

    // ---------------------------------------------------------------------------------------------------------------------------------------------
    
    //DATOS PARA GRAFICO DE RUTINARIAS
    //creo mi arreglo donde guardaré los valores de mi consulta
    $arreglo_rutinarias=[];
    $consulta=$con->query("SELECT Rutinario, count(Rutinario) as 'cantidad' from tbltarea group by Rutinario order by Rutinario ASC");
    //recorro los resultados y los guardo en mi arreglo
    while($fila=mysqli_fetch_assoc($consulta)){
        $arreglo_rutinarias[]=intval($fila['cantidad']);
    }
    //creo variables con los valores del array
    $noRutinarias=$arreglo_rutinarias[0];
    $rutinarias=$arreglo_rutinarias[1];
    $totalRutinarias=$rutinarias+$noRutinarias;
    //ahora calculo porcentajes y los asigno a un script
    
    // ---------------------------------------------------------------------------------------------------------------------------------------------
    //DATOS PARA GRAFICO DE CANTIDAD DE PELIGROS NO ACEPTABLES POR VALORACIONDE RIESGO
    
    //CANTIDAD DE PELIGROS NO ACEPTABLES POR TAREA
    $arreglo_pel_noacept=[];
    $labels_tarea=[];
    $consulta1=$con->query("SELECT ta.nombre as 'Tarea', COUNT(mp.NivelDeficiencia*mp.Nivelexposicion*mp.NivelConsecuencia) as 'Peligros no aeptables'
        FROM tblmatrizpeligros as mp INNER JOIN tbltarea as ta 
        ON mp.tarea=ta.codigo
        WHERE (mp.NivelDeficiencia*mp.Nivelexposicion*mp.NivelConsecuencia)>500
        GROUP BY ta.Nombre;");
    //recorro los resultados y los guardo en mi arreglo
    while($fila=mysqli_fetch_assoc($consulta1)){
        $labels_tarea[]=$fila['Tarea'];
        $arreglo_pel_noacept[]=$fila['Peligros no aeptables'];
        
        
    }
    $labelsJason=json_encode($labels_tarea);
    $peligrosJason=json_encode($arreglo_pel_noacept);

    // ---------------------------------------------------------------------------------------------------------------------------------------------
    //DATOS PARA GRAFICO DE CANTIDAD DE PELIGROS CON CONTROL ESPECIFICO POR VALORACIONDE RIESGO
    $arreglo_pel_control=[];
    $labels_control=[];
    $consulta2=$con->query("SELECT ta.nombre as 'Tarea', COUNT(mp.NivelDeficiencia*mp.Nivelexposicion*mp.NivelConsecuencia) as 'Peligros con control'
        FROM tblmatrizpeligros as mp INNER JOIN tbltarea as ta 
        ON mp.tarea=ta.codigo
        WHERE (mp.NivelDeficiencia*mp.Nivelexposicion*mp.NivelConsecuencia)<=500 AND (mp.NivelDeficiencia*mp.Nivelexposicion*mp.NivelConsecuencia)>120
        GROUP BY ta.Nombre;");
    //recorro los resultados y los guardo en mi arreglo
    while($fila=mysqli_fetch_assoc($consulta2)){
        $labels_control[]=$fila['Tarea'];
        $arreglo_pel_control[]=$fila['Peligros con control'];
        
    }
    $labels_controlJason=json_encode($labels_control);
    $peligros_controlJason=json_encode($arreglo_pel_control);
    
    
    //---------------------------------------------------------------------------------------------------------
    //DATOS PARA GRAFICO DE CANTIDAD DE PELIGROS POR PROCESO
    //creo los arreglos para guardar los labels y los datos
    $arreglo_procesos=[];
    $arreglo_cantidad=[];
    //
    //hago la consulta
    $consulta3=$con->query("SELECT pr.nombre as 'Proceso', COUNT(mp.codigo) as 'Cantidad de peligros'
        FROM tblmatrizpeligros as mp INNER JOIN tbltarea as ta 
        ON mp.tarea=ta.codigo inner join tblactividad as ac
        on ta.actividad=ac.codigo inner join tblproceso as pr
        on ac.proceso=pr.codigo
        GROUP BY pr.nombre;");

    //recorro la consulta y guardo los datos en los arreglos
    while($fila=mysqli_fetch_assoc($consulta3)){
        $arreglo_procesos[]=$fila['Proceso'];
        $arreglo_cantidad[]=$fila['Cantidad de peligros'];   
    }
    //convierto los arreglos en formato json para usarlos con javascript
    $procesosJason=json_encode($arreglo_procesos);
    $cantidadJason=json_encode($arreglo_cantidad);
    
    //creo variables con los valores del array
    
    
//----------------------------------------------------------------------------------------------------------
//DATOS PARA GRAFICO DE CANTIDAD DE PELIGROS PARA CADA ACEPTABILIDAD POR PROCESO
// codigo para grafico de barras multiples
    $consulta4=$con->query("SELECT zl.nombre AS Zona, (mp.NivelDeficiencia*mp.Nivelexposicion*mp.NivelConsecuencia) as 'Nivel de riesgo'
        FROM tblzonalugar as zl INNER JOIN tblmatrizpeligros as mp ON zl.Codigo = mp.ZonaLugar;");

//0-20 es 4, de 20-120 es 3, de 120-500 es 2 y de 500 a 4000 es 1
    //el arreglo seria [aceptable, Mejorable, aceptable con control, no aceptable]
    
    
    $arreglo_peligros_zona=[];//arreglo para guardar los resultados de la consulta
    $arr_zonas=[];
    while($fila=mysqli_fetch_assoc($consulta4)){
        
        $zona=$fila['Zona'];
        $valor=intval($fila['Nivel de riesgo']);

        if(array_key_exists($zona, $arreglo_peligros_zona)){

            switch ($valor) {
                case $valor>0 and $valor<=20:
                    $arreglo_peligros_zona[$zona][0]+=1;
                    break;
                
                case $valor>20 and $valor<=120:
                    $arreglo_peligros_zona[$zona][1]+=1;
                    break;
                
                case $valor>120 and $valor<=500:
                    $arreglo_peligros_zona[$zona][2]+=1;
                    break;
                
                case $valor>500 and $valor<=4000:
                    $arreglo_peligros_zona[$zona][3]+=1;
                    break;
                
                default:
                    # code...
                    break;
            }

        }else{
            $arr_zonas[]=$zona;
            $arreglo_peligros_zona[$fila['Zona']]=[0,0,0,0];
            switch ($valor) {
                case $valor>0 and $valor<=20:
                    $arreglo_peligros_zona[$zona][0]+=1;
                    break;
                
                case $valor>20 and $valor<=120:
                    $arreglo_peligros_zona[$zona][1]+=1;
                    break;
                
                case $valor>120 and $valor<=500:
                    $arreglo_peligros_zona[$zona][2]+=1;
                    break;
                
                case $valor>500 and $valor<=4000:
                    $arreglo_peligros_zona[$zona][3]+=1;
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }
    //arreglos para guardar valores por aceptabilidad y llevar a grafica
    $arr_acept=[];
    $arr_mej=[];
    $arr_cont=[];
    $arr_noacept=[];
    

    foreach ($arreglo_peligros_zona as $zona => $valores) {//rrecorro arreglo de consulta y extraigo los valores de aceptabilidad

        for ($j=0; $j < 4; $j++) { 
            switch ($j) {
                case 0:
                    $arr_acept[]=$valores[$j];
                    break;
                case 1:
                    $arr_mej[]=$valores[$j];
                    break;
                case 2:
                    $arr_cont[]=$valores[$j];
                    break;
                case 3:
                    $arr_noacept[]=$valores[$j];
                    break;
                
            }
            
        }
    }
    print_r($arr_cont);
    ?>
    <script>
        //GRÁFICO 1
        let rutinarias=<?php echo ($rutinarias*100)/$totalRutinarias; ?>;
        let noRutinarias=<?php echo ($noRutinarias*100)/$totalRutinarias; ?>;
        //GRÁFICO 2
        let labels_tareas=<?php echo $labelsJason; ?>;
        let cantidad_peligros=<?php echo $peligrosJason; ?>;
        //GRÁFICO 3
        let labels_control=<?php echo $labels_controlJason; ?>;
        let cantidad_peligros_control=<?php echo $peligros_controlJason; ?>;
        
        //GRÁFICO 4
        //asigno a un array de javascript los arreglos de php en formato json
        let labels_procesos=<?php echo $procesosJason; ?>;
        let cantidad_peligros_proceso=<?php echo $cantidadJason; ?>;
        
        //GRÁFICO 5
        let labels_zonas=<?php echo (json_encode($arr_zonas));?>;
        let data_aceptables=<?php echo (json_encode($arr_acept));?>;
        let data_mejorables=<?php echo (json_encode($arr_mej));?>;
        let data_control=<?php echo (json_encode($arr_cont));?>;
        let data_noaceptables=<?php echo (json_encode($arr_noacept));?>;

    </script>
    <!-- Chart End -->

    <script src="graficas.js"></script>
</body>
</html>