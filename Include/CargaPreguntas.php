<?php
    require_once("./BD.php");
    BD::creaConexion();
    $preguntas = BD::leePreguntas();
    echo json_encode($preguntas);
?>