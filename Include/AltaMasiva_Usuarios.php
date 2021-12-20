<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link  rel="icon"   href="../Recursos/logo.png" type="image/png" />
    <link rel="stylesheet" href="../css/main.css">
    <script src="../JS/menu.js"></script>
    <script src="../JS/AltaMasivaUsuarios.js"></script>
</head>
<body>
<?php require_once("./Menu.php");?>
<main>
<section class="contenido">
        <!-- <input id="fileInput" type="file" size="50" onchange="processFiles(this.files)"> -->
       <section class="altasMasivas">
           <h1>Alta Masiva de Usuarios</h1>
        <textarea placeholder="email;nombre;apellido;contraseña;fecha[yyyy-mm-dd]" id="cajaUsuarios" rows="15" cols="80"></textarea><br>
        <button id="EnviarUsuarios" value="Enviar">Enviar</button>
       </section>
    </section>
</main>
    
<?php require_once("./Footer.php");?>


</body>
</html>


<?php

require_once("BD.php");

$obj = new stdClass();
BD::creaConexion();

if(isset($_POST["usuarios"])){

    $p = $_POST["usuarios"];
    $n_usuarios = $_POST["n_usuarios"];

    $a = json_decode($p, true);

    for($i=0;$i<$n_usuarios;$i++){
        $usuario = new Usuario($a[$i][0],$a[$i][1],$a[$i][2],$a[$i][3],$a[$i][4],"Alumno");
        if(!BD::compruebaUser($usuario->get_email())){
            BD::altaUsuario($usuario);
        }else{
            $obj->correosMalos.=$usuario->get_email()."\n";
        }
        
    }
    $obj->respuesta = true;

  } else {
    $obj->respuesta = false;
    }
    echo json_encode($obj);
?>