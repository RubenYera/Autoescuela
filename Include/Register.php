<?php
    require_once("./Login.php");
    if(!Login::usuarioLogeado()){
        header("Location: LoginForm.php");  
    }
    require_once('../Class/Usuario.php');
    require_once('BD.php');
    require_once('Session.php');
    require_once('validator.php');
    require_once('Correo.php');

    BD::creaConexion();
    $errores=0;
    $validator = new validator();
    $campos = array();
    if(isset($_POST['Enviar'])){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $password = $nombre."123";
        $fecha = $_POST['fechaNac'];
        $rol = $_POST['rol'];
        $foto = "iVBORw0KGgoAAAANSUhEUgAAAgAAAAIACAMAAADDpiTIAAAAA3NCSVQICAjb4U/gAAAACXBIWXMAAJukAACbpAG+CklmAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAwBQTFRF////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";
        
        $campos[]=$nombre;
        $campos[]=$apellidos;
        $campos[]=$email;
        $campos[]=$fecha;

        foreach ($campos as $valor) {
            if(!$validator->Requerido($valor))
            $errores+=1;
        }

        if(!$validator->CadenaRango($nombre,30))
        $errores+=1;
        
        if(!$validator->CadenaRango($apellidos,30))
        $errores+=1;

        if(!$validator->Email($email)){
        $errores+=1;
        }else{
            if(BD::compruebaUser($email))
            $errores=0;
        }
        
        if($rol==1){
            $rol="Profesor";
        }else{
            $rol="Alumno";
        }
        
        if($errores==0){
            $u = new Usuario($email,$nombre,$apellidos,$password,$fecha,$rol,$foto);
            BD::altaUser($u);

            $html = "
            <html>
            <head>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
            <title>Credenciales</title>
            </head>
            <body>
            <h2>Esta es su contrase??a</h2>";
            $html=$html.$u->get_password();
            $html=$html.'</body>
            </html>';

            correo::enviarCorreo("ryeramartin@gmail.com", "rym.1234", "Credenciales de Usuario", "Credenciales", $html, $u->get_email(),"recursos/perfil.png");

        }
        
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
    <script src="../JS/validator.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
<body>
<div>
<?php require_once("./Menu.php");?>
<main>
        
        <form action="Register.php" name="form1" method="post">
        <h1>Registrar Usuario</h1>
            <div>
                <p>Nombre: <input type="text" name="nombre" id="nombre" class="campo letras"></p> 
            </div>
            <div>
                <p>Apellidos: <input type="text" name="apellidos" id="apellidos" class="campo letras"></p> 
            </div>
            <div>
                <p>Correo: <input type="text" name="email" id="email" class="campo email"></p> 
            </div>
            <div>
                <p>Fecha Nacimiento: <input type="date" name="fechaNac" id="fechaNac" class="campo"></p> 
            </div>
            <div>
                <select name="rol">
                    <option value="1">Profesor</option> 
                    <option value="2">Alumno</option> 
                </select>
            </div>
            <div>
                <input type="submit" name="Enviar" id="Enviar" value="Registrar">
            </div>

        </form>
    </div>

</main>
<?php require_once("Footer.php"); ?>
</body>
</html>