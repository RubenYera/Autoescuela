<?php
require_once("./BD.php");
require_once("../Class/Examen.php");

    $obj = new stdClass();
    $sdfsdf = $_POST['preguntas'];
    if($_POST['preguntas']!="" && is_numeric($_POST['Duracion']) && $_POST['Duracion']>0 && $_POST['Descripcion']!=""){
        $id_preguntas = explode(",",$_POST['preguntas']);
        $duracion = $_POST['Duracion'];
        $descripcion = $_POST['Descripcion'];
        BD::creaConexion();
        $examen = new Examen($descripcion,$duracion,count($id_preguntas));
        
        // BD::altaExamen($examen);
        $examen = BD::leeExamenDescripcion($descripcion);//para darle una id

        foreach($id_preguntas as $p){
            $pregunta = BD::leePregunta($p);
            BD::altaExamen_Pregunta($examen,$pregunta);
        }

        $obj->respuesta = true;
    }else{
        $obj->respuesta = false;
    }
    echo json_encode($obj);
?>