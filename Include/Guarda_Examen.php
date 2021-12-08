<?php
require_once("./BD.php");
require_once("../Class/Examen.php");

    $obj = new stdClass();
    if(isset($_POST['preguntas']) && isset($_POST['Duracion']) && isset($_POST['Descripcion'])){
        $id_preguntas = explode(",",$_POST['preguntas']);
        $duracion = $_POST['Duracion'];
        $descripcion = $_POST['Descripcion'];
        BD::creaConexion();
        $examen = new Examen($descripcion,$duracion,count($preguntas));
        
        BD::altaExamen($examen);
        $examen = BD::leeExamen($descripcion);//para darle una id

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