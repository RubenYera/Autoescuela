<?php
    require_once('../Class/Usuario.php');
    require_once('./BD.php');
    require_once('./Session.php');

    if(isset($_POST['Registrar'])){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos']
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $fecha = $_POST['fechaNac'];
        $foto = $_POST['foto'];

        if(empty($nombre) || empty($apellidos) ||  empty($email) || empty($password) || empty($password2) || empty($fecha)){
            $error = "Uno de los campos está vacio";
        }else{
            
        }
        $u = new Usuario($email,$nombre,$apellidos,$password,$fecha);
        DB::insertaUsuario($u);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
        <?php echo $error?>
        <h3>Registrar Usuario</h3>
        <form action="Register.php" name="form1" method="post">
            <div>
                <p>Nombre: <input type="text" name="nombre" id="nombre"></p>
            </div>
            <div>
                <p>Apellidos: <input type="text" name="Apellidos" id="Apellidos"></p>
            </div>
            <div>
                <p>Correo: <input type="text" name="email" id="email"></p>
            </div>
            <div>
                <p>Contraseña: <input type="password" name="password" id="password"></p>
            </div>
            <div>
                <p>Confirmar contraseña: <input type="password" name="password2" id="password2"></p>
            </div>
            <div>
                <p>Fecha Nacimiento: <input type="date" name="fechaNac" id="fechaNac"></p>
            </div>
            <div>
                <p>Foto de perfil: <input type="file" name="foto" id="foto"></p>
            </div>
            <div>
                <input type="submit" name="Registrar" id="Registrar" value="Registrar">
            </div>

        </form>
    </div>
</body>
</html>