<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_POST["opcion"])){
    echo $_POST["opcion"];
}?>
<div>
        <h3>Alta preguntas</h3>
        <form action="Alta_Pregunta.php" name="form1" method="post">
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
            </div>
            <div>
                <input type="submit" name="Aceptar" id="Aceptar" value="Aceptar">
            </div>

        </form>
    </div>
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

    
    if($tematica==1){
        $tematica=="Señales";
    }else{
        $tematica=="Velocidades";
    }
    
    $respuestas = array();
    if($errores==0){
        $tem = BD::leeTematica($tematica);
        $pregunta = new Pregunta($Enunciado,$tem);
        $respuesta1 = new Respuesta($opcion1,$pregunta);
        $respuesta2 = new Respuesta($opcion2,$pregunta);
        $respuesta3 = new Respuesta($opcion3,$pregunta);

        $respuestas[1] = $respuesta1;
        $respuestas[2] = $respuesta2;
        $respuestas[3] = $respuesta3;
        
        $correcta = $respuestas[$_POST["opcion"]];
        
    }


}

?>