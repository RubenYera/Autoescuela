<?php
    require_once("./Session.php");
    require_once("../Class/Usuario.php");
    
    Session::iniciar();
    $u = Session::leer('Usuario');
    
    if(strcmp($u->get_rol(),"Profesor")==0){
?>
        <header>
            <section>
                <a href=""><img id="logo" src="../Recursos/logo.png" width="120px" height="80px" alt=""></a>
                <a href=""><img id="perfil" src="../Recursos/perfil.png" width="25px" height="25px" alt=""></a>

                <section id="menuUsuario" class="oculto">
                    <ul class="submenu">
                        <li><a href="#">Editar Usuario</a></li>
                        <li><a href="./LogOut.php">Cerrar Sesion</a></li>
                    </ul>
                </section>
            </section>

            <nav>
                <ul>
                    <li class="categoria">
                        <a href="lista_Usuario.php">Usuarios</a>
                        <ul class="submenu">
                            <li><a href="Register.php">Alta Usuario</a></li>
                            <li><a href="#">Alta masiva usuarios</a></li>
                        </ul>
                    </li>
                    <li class="categoria">
                        <a href="lista_Tematica">Temáticas</a>
                        <ul class="submenu">
                            <li><a href="#">Alta Temática</a></li>
                        </ul>
                    </li>
                    <li class="categoria">
                        <a href="lista_Preguntas.php">Preguntas</a>
                        <ul class="submenu">
                            <li><a href="alta_Pregunta.php">Alta Pregunta</a></li>
                            <li><a href="#">Alta Masiva Preguntas</a></li>
                        </ul>
                    </li>
                    <li class="categoria">
                        <a href="lista_Examenes.php">Exámenes</a>
                        <ul class="submenu">
                            <li><a href="Examen_Pregunta.php">Alta Examen</a></li>
                            <li><a href="#">Historico</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>

<?php

} else {
    if(strcmp($u->get_rol(),"Alumno")==0){
?>
        <header>
        <section>
                <a href=""><img id="logo" src="../Recursos/logo.png" width="120px" height="80px" alt=""></a>
                <a href=""><img id="perfil" src="../Recursos/perfil.png" width="25px" height="25px" alt=""></a>
                <section id="menuUsuario" class="oculto">
                    <ul class="submenu">
                        <li><a href="#">Editar Usuario</a></li>
                        <li><a href="./LogOut.php">Cerrar Sesion</a></li>
                    </ul>
                </section>
            </section>

            <nav>
                <ul>
                    <li class="categoria"><a href="#">Historico Examenes</a>
                    </li>
                    <li class="categoria"><a href="#">Examen aleatorio</a>
                    </li>
                    <li class="categoria"><a href="#">Examenes</a>
                    </li>

                </ul>
            </nav>
        </header>
<?php
    }
}
?>

