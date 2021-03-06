<?php
    require_once("./Login.php");
    if(!Login::usuarioLogeado()){
        header("Location: LoginForm.php");  
    }
    require_once("./BD.php");
    require_once("./Funciones.php");
    BD::creaConexion();
    $columnas = array("Alumno/a","Correo","Rol", "Activado", "Acciones");
    $registros = BD::obtienefilas("usuario");
    $aux = round($registros/4,0,PHP_ROUND_HALF_DOWN);
    if($registros<=4)
    $aux = 0;
    if(isset($_GET['pag'])){
        $pag = $_GET['pag'];
        if($pag>$aux){
            $pag=$aux;
        }
        $total = 4*$pag;
        $menos1=$pag-1;
        if($pag==0){
            $menos1 = $pag;
        }
        $mas1 = $pag+1;
        if($aux==0)
        $mas1=0;


    } else {
        $pag = 0;
        $total = 0;
        $menos1 = $pag-1;
        $mas1 = $pag+1;
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
    <!-- <script src="../JS/listaUsuarios.js"></script> -->
    <script src="../JS/menu.js"></script>
    <script src="../JS/tabla.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
<body>
    <?php require_once("./Menu.php");?>
    <main>
    <section id="contenedor" name="contenedor" class="contenedor">
        <h1>Listado de Usuarios</h1>
        
<?php
    //Este php te pintarĂ¡ la tabla de usuarios
    $tabla = Funciones::pintaTablaUsuarios($columnas,$total,4);
    echo $tabla;

    $enlace = '<p class="paginador">';

    $enlace.= "<a href='lista_Usuario.php?pag=0'>&lt;&lt;</a>";

    $enlace.= "<a href='lista_Usuario.php?pag=$menos1'>&lt;</a>";

    for($i=0; $i<=$aux;$i++){
        if($pag == $i){
            $activo = "activo";
        } else {
            $activo = "noActivo";
        }
        $enlace.="<a class='$activo' href='lista_Usuario.php?pag=$i'>".($i+1)."</a>";
    }

    $enlace.= "<a href='lista_Usuario.php?pag=$mas1'>&gt;</a>";

    $enlace.= "<a href='lista_Usuario.php?pag=$aux'>&gt;&gt;</a>";

    $enlace.= '</p>';
?>
    </section>

    <div><?php echo $enlace ?></div>
    </main>
    <?php require_once("Footer.php"); ?>
</body>
</html>