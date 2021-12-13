<?php
    require_once('../Class/Usuario.php');
    require_once('BD.php');
    require_once('Session.php');
    require_once('validator.php');

    BD::creaConexion();
    $errores=0;
    $validator = new validator();
    $campos = array();
    if(isset($_POST['Registrar'])){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $fecha = $_POST['fechaNac'];
        $rol = $_POST['rol'];

        $campos[]=$nombre;
        $campos[]=$apellidos;
        $campos[]=$email;
        $campos[]=$password;
        $campos[]=$fecha;

        foreach ($campos as $valor) {
            if(!$validator->Requerido($valor))
            $errores+=1;
        }

        if(!$validator->CadenaRango($nombre,30))
        $errores+=1;
        
        if(!$validator->CadenaRango($apellidos,30))
        $errores+=1;
        
        if(!$validator->CadenaRango($password,30))
        $errores+=1;

        if(!$validator->Email($email)){
        $errores+=1;
        }else{
            if(BD::compruebaUser($email))
            $errores+=1;
        }
        
        if($rol==1){
            $rol="Profesor";
        }else{
            $rol="Alumno";
        }
        
        if($errores==0){
            $u = new Usuario($email,$nombre,$apellidos,$password,$fecha,$rol);
            BD::altaUser($u);
            header("Location: LoginForm.php");
            //var_dump($u);
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../JS/menu.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
<body>
<div>
<?php require_once("./Menu.php");?>
<main>
        <h1>Registrar Usuario</h1>
        <form action="Register.php" name="form1" method="post">
            <div>
                <p>Nombre: <input type="text" name="nombre" id="nombre"></p> 
            </div>
            <div>
                <p>Apellidos: <input type="text" name="apellidos" id="apellidos"></p> 
            </div>
            <div>
                <p>Correo: <input type="text" name="email" id="email"></p> 
            </div>
            <div>
                <p>Contraseña: <input type="password" name="password" id="password"></p> 
            </div>
            <div>
                <p>Fecha Nacimiento: <input type="date" name="fechaNac" id="fechaNac"></p> 
            </div>
            <div>
                <select name="rol">
                    <option value="1">Profesor</option> 
                    <option value="2">Alumno</option> 
                </select>
            </div>
            <div>
                <input type="submit" name="Registrar" id="Registrar" value="Registrar">
            </div>

        </form>
    </div>

</main>
</body>
</html>