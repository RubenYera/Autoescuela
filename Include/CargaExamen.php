<?php
    require_once("./BD.php");
    BD::creaConexion();
    $ID_Examen = $_GET['ID_Examen'];
    $preguntas = BD::obtienePreguntasExamen($ID_Examen);

    for($i=0; $i<count($preguntas);$i++){
        $id_pregunta=$preguntas[$i]->get_id();
        $respuestas = BD::leeRespuestaPregunta($id_pregunta);
        $preguntas[$i]->respuestas = $respuestas;
    }

    $json = json_encode($preguntas);
    echo $json;
?>