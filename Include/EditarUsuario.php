<?php
    require_once("./Login.php");
    if(!Login::usuarioLogeado()){
        header("Location: LoginForm.php");  
    }
    require_once("./Session.php");
    $u = Session::leer('Usuario');

    if(isset($_POST['Enviar'])){
        if(isset($_FILES['imagen'])){
            //Recibimos los datos de la imagen
            $nombre_imagen = "imgPerfil".$u->get_id();

            //Ruta de la carpeta de destino
            $carpeta=$_SERVER['DOCUMENT_ROOT'].'/'."Recursos".'/';

            $a = $_FILES;

            //Movemos la imagen de la carpeta temporal a la de destino
            move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta.$nombre_imagen);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
<body>
<?php require_once("./Menu.php");?>
<main>
        
        <form action="EditarUsuario.php" name="form1" method="post">
        <h1>Editar Usuario</h1>
            <div>
                <p>Nombre: <input type="text" name="nombre" id="nombre" class="campo letras"></p> 
            </div>
            <div>
                <p>Apellidos: <input type="text" name="apellidos" id="apellidos" class="campo letras"></p> 
            </div>
            <div>
                <p>Contraseña: <input type="password" name="password" id="password" class="campo password"></p> 
            </div>
            <div>
                <p>Fecha Nacimiento: <input type="date" name="fechaNac" id="fechaNac" class="campo"></p> 
            </div>
            <div>
                <input type="file" name="imagen">
            </div>
            <div>
                <input type="submit" name="Enviar" id="Enviar" value="Aceptar">
            </div>

        </form>
    </div>

</main>
<?php require_once("Footer.php"); ?> 
</body>
</html>