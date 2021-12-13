<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../JS/Examen_Preguntas.js"></script>
    <script src="../JS/menu.js"></script>
    <link rel="stylesheet" href="Examenpregunta.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
<body>

<?php include ("./Menu.php");?>
    <main>
    <h1>Alta Exámen</h1>
    <form action="Examen_Pregunta.php" method="POST">
        <p>Descripcion <input type="text" name="Descripcion" id="Descripcion">&nbsp;&nbsp;Duración <input type="text" name="Duracion" id="Duracion"></p>
        <p>Filtrar Pregunta <input type="search" id="filtro" name="filtro"></p>
        <section id="contenedor">
            <div id="Caja_preguntas" ></div>

            <div id="Caja_Preguntas_Examen"></div>
        </section>

        <p id="btnGuardar"><input type="button" value="Guardar" name="Guardar" id="Guardar"></p>
    </form>
    </main>
   
</body>
</html>
