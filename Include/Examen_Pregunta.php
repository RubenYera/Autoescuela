<?php
    require_once("./Login.php");
    if(!Login::usuarioLogeado()){
        header("Location: LoginForm.php");  
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="icon"   href="../Recursos/logo.png" type="image/png" />
    <script src="../JS/Examen_Preguntas.js"></script>
    <script src="../JS/menu.js"></script>
    <script src="../JS/validator.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
<body>

<?php include ("./Menu.php");?>
    <main>
    
    <form action="Examen_Pregunta.php" method="POST">
    <h1>Alta Exámen</h1>
        <p>Descripcion <input type="text" name="Descripcion" id="Descripcion" class="campo">&nbsp;&nbsp;Duración <input type="text" name="Duracion" id="Duracion" class="campo numeros"></p>
        <p id="preguntas">Filtrar Pregunta <input type="search" id="filtro" name="filtro"> <input type="button" value="Guardar" name="Guardar" id="Guardar"></p>
        <p id="preguntas_examen">Filtrar Pregunta Examen<input type="search" id="filtro2" name="filtro"></p>
        <section id="contenedor_preguntas_examen">
            <div id="Caja_preguntas" ></div>

            <div id="Caja_Preguntas_Examen"></div>
        </section>
    </form>
    </main>
    <?php require_once("Footer.php"); ?> 
</body>
</html>
