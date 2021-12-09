<?php
    require_once("./BD.php");
    BD::creaConexion();
    $usuarios = BD::leeUsuarios();
    $json = json_encode($usuarios);
    echo $json;
?>