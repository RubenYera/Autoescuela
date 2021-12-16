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
    <link rel="stylesheet" href="../css/main.css">
    <script src="../JS/menu.js"></script>
    <title>Document</title>
</head>
<body>
    <?php require_once("./Menu.php");?>
    <main>
        <form action="Alta_Tematica.php" name="form1" method="post">
        <h1>Alta Temáticas</h1>
            <div>
                <p>Descripcion: <input type="text" name="Descripcion" id="Descripcion"></p> 
            </div>
            <div>
                <input type="submit" name="Aceptar" id="Aceptar" value="Aceptar">
            </div>

        </form>
    </main>

    <?php require_once("Footer.php"); ?>
</body>
</html>
<?php
   require_once('BD.php');
   require_once('Session.php');
   require_once('validator.php');
   require_once('../Class/Tematica.php');

   $errores=0;
    if(isset($_POST["Aceptar"])){
        BD::creaConexion();
        $descripcion = $_POST["Descripcion"];

        $validator = new validator();
        if(!$validator->Requerido($descripcion))
        $errores+=1;

        if($errores==0){
            $tematica = new Tematica($descripcion);
            BD::altaTematica($tematica);
            // var_dump($tematica);
        }
    }
?>
