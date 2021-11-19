<?php
    require_once('../Class/Usuario.php');
    require_once('./BD.php');
    require_once('./Session.php');
    require_once('validator.php');

    $validator = new validator();
    $campos = array();
    if(isset($_POST['Registrar'])){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $fecha = $_POST['fechaNac'];
        $campos[]=$nombre;
        $campos[]=$apellidos;
        $campos[]=$email;
        $campos[]=$password;
        $campos[]=$fecha; 

        foreach ($campos as $valor) {
            $validator->Requerido($valor);
        }

        $validator->CadenaRango($nombre,30);
        $validator->CadenaRango($apellidos,30);
        $validator->CadenaRango($password,30);
        if($validator->ValidacionPasada()){
            $u = new Usuario($email,$nombre,$apellidos,$password,$fecha);
            // DB::insertaUsuario($u);
        }
        
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
        <h3>Registrar Usuario</h3>
        <form action="Register.php" name="form1" method="post">
            <div>
                <p>Nombre: <input type="text" name="nombre" id="nombre"></p> <?php if(isset($_POST['nombre']))echo $validator->ImprimirError($_POST['nombre'])?>
            </div>
            <div>
                <p>Apellidos: <input type="text" name="apellidos" id="apellidos"></p> <?php if(isset($_POST['apellidos']))echo $validator->ImprimirError($_POST['apellidos'])?>
            </div>
            <div>
                <p>Correo: <input type="text" name="email" id="email"></p> <?php if(isset($_POST['email']))echo $validator->ImprimirError($_POST['email'])?>
            </div>
            <div>
                <p>Contraseña: <input type="password" name="password" id="password"></p> <?php if(isset($_POST['password']))echo $validator->ImprimirError($_POST['password'])?>
            </div>
            <div>
                <p>Fecha Nacimiento: <input type="date" name="fechaNac" id="fechaNac"></p> <?php if(isset($_POST['fechaNac']))echo $validator->ImprimirError($_POST['fechaNac'])?>
            </div>
            <div>
                <p>Rol: <input type="text" name="rol" id="rol"></p> <?php if(isset($_POST['rol']))echo $validator->ImprimirError($_POST['rol'])?>
            </div>
            <div>
                <input type="submit" name="Registrar" id="Registrar" value="Registrar">
            </div>

        </form>
    </div>
</body>
</html>