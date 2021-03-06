<?php
    require_once("./Session.php");
    require_once("../Class/Usuario.php");
    
    Session::iniciar();
    $u = Session::leer('Usuario');
    
    //Este menun se activará si el rol del usuario es Profesor
    if(strcmp($u->get_rol(),"Profesor")==0){
?>
        <header>
            <section>
                <a href="./Principal.php"><img id="logo" src="../Recursos/logo.png" width="120px" height="80px" alt=""></a>
                <a href=""><img id="perfil" src="data:image/jpeg;base64,<?php echo $u->get_foto();?>" width="25px" height="25px" alt=""></a>

                <section id="menuUsuario" class="oculto">
                    <ul class="submenu">
                        <li><a href="./EditarUsuario.php">Editar Usuario</a></li>
                        <li><a href="./LogOut.php">Cerrar Sesion</a></li>
                    </ul>
                </section>
            </section>

            <nav>
                <ul>
                    <li class="categoria">
                        <a href="lista_Usuario.php"><i class="far fa-address-book"></i> Usuarios</a>
                        <ul class="submenu">
                            <li><a href="Register.php">Alta Usuario</a></li>
                            <li><a href="AltaMasiva_Usuarios.php">Alta masiva usuarios</a></li>
                        </ul>
                    </li>
                    <li class="categoria">
                        <a href="lista_Tematica"><i class="fas fa-asterisk"></i> Temáticas</a>
                        <ul class="submenu">
                            <li><a href="Alta_Tematica.php">Alta Temática</a></li>
                        </ul>
                    </li>
                    <li class="categoria">
                        <a href="lista_Preguntas.php"><i class="far fa-question-circle"></i> Preguntas</a>
                        <ul class="submenu">
                            <li><a href="alta_Pregunta.php">Alta Pregunta</a></li>
                            <li><a href="#">Alta Masiva Preguntas</a></li>
                        </ul>
                    </li>
                    <li class="categoria">
                        <a href="lista_Examenes.php"><i class="far fa-edit"></i> Exámenes</a>
                        <ul class="submenu">
                            <li><a href="Examen_Pregunta.php">Alta Examen</a></li>
                            <li><a href="#">Historico</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>

<?php

    //Este menun se activará si el rol del usuario es Alumno.
} else {
    if(strcmp($u->get_rol(),"Alumno")==0){
?>
        <header>
        <section>
                <a href="./Principal.php"><img id="logo" src="../Recursos/logo.png" width="120px" height="80px" alt=""></a>
                <a href=""><img id="perfil" src="data:image/jpeg;base64,<?php echo $u->get_foto();?>" width="25px" height="25px" alt=""></a>
                <section id="menuUsuario" class="oculto">
                    <ul class="submenu">
                        <li><a href="./EditarUsuario.php">Editar Usuario</a></li>
                        <li><a href="./LogOut.php">Cerrar Sesion</a></li>
                    </ul>
                </section>
            </section>

            <nav>
                <ul>
                    <li class="categoria"><a href="#">Historico Examenes</a>
                    </li>
                    <li class="categoria"><a href="./Examinar.php?ID_Examen=1">Examen aleatorio</a>
                    </li>
                    <li class="categoria"><a href="./lista_Examinar.php">Examenes</a>
                    </li>

                </ul>
            </nav>
        </header>
<?php
    }
}
?>

