
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../JS/validator.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <link  rel="icon"   href="../Recursos/logo.png" type="image/png" />
    <title>LoginForm</title>
</head>
<body>
    <div>
        <?php if(isset($error))echo $error?>
        <form action="LoginForm.php" name="form1" class="login" method="post">
            <div>
                <img src="../recursos/logo.png" alt="">
            </div>
            <div>
                <p>Correo: <input type="text" name="email" id="email"></p>
            </div>
            <div>
                <p>Contraseña: <input type="password" name="password" id="password" class="password"></p>
            </div>
            <div>
                <input type="submit" name="Enviar" id="Enviar"><br><br>
                <a href="">He olvidado mi contraseña.</a>
            </div>

        </form>
    </div>
</body>
</html>
<?php
require_once("Login.php");
require_once("Session.php");
require_once("../Class/Usuario.php");
require_once("BD.php");

    BD::creaConexion();
    $error="";
    if(isset($_POST["Enviar"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        if(empty($email) || empty($password)){
            $error = "Uno de los campos está vacio";
        }else{
            if(Login::existeUsuario($email)){
                $u = BD::obtieneUser($email);
                $contrasenia=$u->get_password();
                if(strcmp($contrasenia,$password)!=0){
                    $error = "Contraseña incorrecta";
                }else{
                    Session::iniciar();
                    Session::escribir('Usuario',BD::obtieneUser($email));
                    header("Location: Principal.php");
                    // var_dump(BD::obtieneUser($email));
                }

            }else{
                $error = "No existe el usuario";
            }
        }
    }


?>