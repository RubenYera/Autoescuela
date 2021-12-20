<?php
    require_once("./Login.php");
    if(!Login::usuarioLogeado()){
        header("Location: LoginForm.php");  
    }
    require_once("./Session.php");
    Session::iniciar();
    $u = Session::leer('Usuario');

    if(isset($_POST['Enviar'])){
        if($_POST['nombre']!=""){
            $nombre = $_POST['nombre'];
            $u->set_nombre($nombre);
        }
        
        if($_POST['apellidos']!=""){
            $apellidos = $_POST['apellidos'];
            $u->set_apellidos($apellidos);
        }
        
        if($_POST['password']!=""){
            $password = $_POST['password'];
            $u->set_password($password);
        }
        

        if($_POST['fechaNac']!=""){
            $fechaNac = $_POST['fechaNac'];
            $u->set_fechaNac($fechaNac);
        }
        

        if(isset($_FILES['imagen'])){
            //Codificamos la imagen y la mandamos a la base de datos
            $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
            $imagen = base64_encode($imagen);

            $u->set_foto($imagen);
        }

        BD::creaConexion();
        BD::actualizaUsuario($u);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="icon"   href="../Recursos/logo.png" type="image/png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="../JS/menu.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
<body>
<?php require_once("./Menu.php");?>
<main>
        
        <form action="EditarUsuario.php" enctype="multipart/form-data" class="alta" name="form1" method="post">
        <h1>Editar Usuario</h1>
            <div>
                <p>Nombre: <input type="text" name="nombre" id="nombre" value="<?php echo $u->get_nombre();?>" class="campo letras"></p> 
            </div>
            <div>
                <p>Apellidos: <input type="text" name="apellidos" id="apellidos" value="<?php echo $u->get_apellidos();?>" class="campo letras"></p> 
            </div>
            <div>
                <p>Contraseña: <input type="password" name="password" id="password" value="<?php echo $u->get_password();?>" class="campo password"></p> 
            </div>
            <div>
                <p>Fecha Nacimiento: <input type="date" name="fechaNac" id="fechaNac" value="<?php echo $u->get_fechaNac();?>" class="campo"></p> 
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