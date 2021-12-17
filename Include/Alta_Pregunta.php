<?php
    require_once("./Login.php");
    if(!Login::usuarioLogeado()){
        header("Location: LoginForm.php");  
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="icon"   href="../Recursos/logo.png" type="image/png" />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="../JS/menu.js"></script>
    <title>Document</title>
</head>
<body>
<?php require_once("./Menu.php");?>
<main>
        
        <form action="Alta_Pregunta.php" enctype="multipart/form-data" name="form1" class="alta" method="post">
        <h1>Alta preguntas</h1>
            <div>
                <p>Tematica:<select name="tematica">
                                <option value="1">Señales</option> 
                                <option value="2">Velocidades</option> 
                            </select></p> 
            </div>
            <div>
                <p>Enunciado: <input type="text" name="enunciado" id="enunciado"></p> 
            </div>
            <div>
                <p>Opcion 1: <input type="text" name="opcion1" id="opcion1">  <input type="radio" name="opcion" id="c1" value="1" checked> Correcta</p> 
            </div>
            <div>
                <p>Opcion 2: <input type="text" name="opcion2" id="opcion2">  <input type="radio" name="opcion" id="c2" value="2"> Correcta</p> 
            </div>
            <div>
                <p>Opcion 3: <input type="text" name="opcion3" id="opcion3">  <input type="radio" name="opcion" id="c3" value="3">  Correcta</p> 
            </div>
            <div>
                <input type="file" name="recurso">
            </div>
            <div>
                <input type="submit" name="Aceptar" id="Aceptar" value="Aceptar">
            </div>

        </form>
</main>
<?php require_once("Footer.php"); ?>
</body>
</html>
<?php
    require_once('BD.php');
    require_once('Session.php');
    require_once('validator.php');
    require_once('../Class/Pregunta.php');
    require_once('../Class/Respuesta.php');
    require_once('../Class/Tematica.php');

    $campos = array();
    $errores = 0;
    if(isset($_POST["Aceptar"])){
        BD::creaConexion();
        $tematica = $_POST["tematica"];
        $Enunciado = $_POST["enunciado"];
        $opcion1 = $_POST["opcion1"];
        $opcion2 = $_POST["opcion2"];
        $opcion3 = $_POST["opcion3"];

        $campos[]=$Enunciado;
        $campos[]=$opcion1;
        $campos[]=$opcion2;
        $campos[]=$opcion3;
        $validator = new validator();

        foreach ($campos as $valor) {
            if(!$validator->Requerido($valor))
            $errores+=1;
        }

        $nombreTematica="";
        if(strcmp($tematica,"1")==0){
            $nombreTematica="Señales";
        }else{
            $nombreTematica="Velocidades";
        }
        
        $respuestas = array();
        if($errores==0){
            $tem = BD::leeTematica($nombreTematica);
            $pregunta = new Pregunta($Enunciado,$tem);
            if(isset($_FILES['recurso'])){
                //Codificamos la imagen y la mandamos a la base de datos
                $recurso = file_get_contents($_FILES['recurso']['tmp_name']);
                $recurso = base64_encode($recurso);
    
                $pregunta->set_recurso($recurso);
            }
            BD::altaPregunta($pregunta);
            $pregunta = BD::leePreguntaEnunciado($pregunta->get_enunciado());//Para darle una ID
            $respuesta1 = new Respuesta($opcion1,$pregunta);
            $respuesta2 = new Respuesta($opcion2,$pregunta);
            $respuesta3 = new Respuesta($opcion3,$pregunta);
            //Grabamos las Respuestas
            BD::altaRespuesta($respuesta1);
            BD::altaRespuesta($respuesta2);
            BD::altaRespuesta($respuesta3);
            //Las leemos para darle ID
            $respuesta1 = BD::leeRespuestaEnunciado($respuesta1->get_enunciado());
            $respuesta2 = BD::leeRespuestaEnunciado($respuesta2->get_enunciado());
            $respuesta3 = BD::leeRespuestaEnunciado($respuesta3->get_enunciado());
            $respuestas[1] = $respuesta1;
            $respuestas[2] = $respuesta2;
            $respuestas[3] = $respuesta3;
            
            $correcta = $respuestas[$_POST["opcion"]];
            BD::grabaRespuestaCorrecta($correcta);
            
        }
    }

?>