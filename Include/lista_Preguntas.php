<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../JS/listaPreguntas.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
<body>
    <?php require_once("./Menu.php");?>
    <section id="contenedor" name="contenedor" class="contenedor">
        <h1>Listado de Usuarios</h1>
        <table id="preguntas" name="preguntas" class="preguntas">
            <tr>
                <th>ID</th>
                <th>Enunciado</th>
                <th>Temática</th>
                <th>Acciones</th>
            </tr>
        </table>
    </section>
</body>
</html>