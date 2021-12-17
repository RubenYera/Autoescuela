<?php
    require_once("./Login.php");
    if(!Login::usuarioLogeado()){
        header("Location: LoginForm.php");  
    }
    $valor = $_GET['ID_Examen'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="icon"   href="../Recursos/logo.png" type="image/png" />
    <script src="../JS/menu.js"></script>
    <script src="../JS/Examinar.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
<body>
<?php include ("./Menu.php");?>

<input type="text" id="ID_Examen" value="<?php echo $valor; ?>">
<main id="main">

</main>
<?php require_once("Footer.php"); ?> 
</body>
</html>