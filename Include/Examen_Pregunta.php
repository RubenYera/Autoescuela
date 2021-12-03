<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../JS/Examen_Preguntas.js"></script>
    <link rel="stylesheet" href="Examenpregunta.css">
    <title>Document</title>
</head>
<body>
    <form action="Examen_Pregunta.php" method="POST">
        <input type="search" id="filtro" name="filtro">

        <div id="Caja_preguntas" ></div>

        <div id="Caja_Preguntas_Examen"></div>
        <input type="button" value="Guardar" name="Guardar" id="Guardar">
    </form>
    
</body>
</html>
<?php
    require_once("./BD.php");
    $preguntas = array();

?>