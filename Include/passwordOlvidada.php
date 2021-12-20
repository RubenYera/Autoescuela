<?php
require_once("./Correo.php");
require_once("./BD.php");
require_once("../Class/Usuario.php");

    if(isset($_POST['Enviar'])){
        $correo=$_POST['email'];

        BD::creaConexion();
        //Comprobamos si existe el usuario
        if(BD::compruebaUser($correo)){
            $u = BD::obtieneUser($correo);

            $html = "
            <html>
            <head>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
            <title>Credenciales</title>
            </head>
            <body>
            <h2>Esta es su contraseña</h2>";
            $html=$html.$u->get_password();
            $html=$html.'</body>
            </html>';

            correo::enviarCorreo("ryeramartin@gmail.com", "rym.1234", "Credenciales de Usuario", "Credenciales", $html, $u->get_email(),"recursos/perfil.png");
            header("Location: LoginForm.php");
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link  rel="icon"   href="../Recursos/logo.png" type="image/png" />
    <title>Document</title>
</head>
<body>
    <div>
        <form action="passwordOlvidada.php" name="form1" class="login" method="post">
            <div>
                <img src="../recursos/logo.png" alt="">
            </div>
            <h1>Recuperar Contraseña</h1>
            <div>
                <p>Correo: <input type="text" name="email" id="email"></p>
            </div>
            <div>
                <input type="submit" name="Enviar" id="Enviar"><br><br>
            </div>

        </form>
    </div>
</body>
</html>