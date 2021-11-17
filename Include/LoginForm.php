<?php
require_once("Session.php");
require_once("Usuario.php");
require_once("BD.php");

    BD::creaConexion();
    $error="";
    if(isset($_POST["Enviar"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        if(empty($email) || empty($password)){
            $error = "Uno de los campos está vacio";
        }else{
            if(BD::compruebaUser($email)){
                $u = BD::obtieneUser($email);
                $contrasenia=$u->get_password();
                if(strcmp($contrasenia,$password)!=0){
                    $error = "Contraseña incorrecta";
                }else{
                    Session::iniciar();
                    Session::escribir('Usuario',BD::obtieneUser($correo));
                    header("Location: https://www.google.es");
                }

            }else{
                $error = "No existe el usuario";
            }
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginForm</title>
</head>
<body>
    <div>
        <?php echo $error?>
        <form action="LoginForm.php" name="form1" method="post">
            <div>
                <p>Correo: <input type="text" name="email" id="email"></p>
            </div>
            <div>
                <p>Contraseña: <input type="password" name="password" id="password"></p>
            </div>
            <div>
                <input type="submit" name="Enviar" id="Enviar"><br><br>
                <a href="">He olvidado mi contraseña.</a><br><br>
                <a href="Register.php">Registrame.</a><br>
            </div>

        </form>
    </div>
</body>
</html>