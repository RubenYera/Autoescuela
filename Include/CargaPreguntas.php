<?php
    require_once("./BD.php");
    BD::creaConexion();
    $preguntas = BD::leePreguntas();
    $json = json_encode($preguntas);
    echo $json;
?>