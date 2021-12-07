<?php
    require_once("./Session.php");
    require_once("../Class/Usuario.php");
    
    Session::iniciar();
    $u = Session::leer('Usuario');
    
    if(strcmp($u->get_rol(),"Profesor")==0){
?>
        <header>
            <section>
                <a href=""><img id="logo" src="../Recursos/Elmuelle2.png" width="120px" height="80px" alt=""></a>
                <a href=""><img id="perfil" src="../Recursos/perfil.png" width="25px" height="25px" alt=""></a>

                <section class="perfil">
                    <ul class="submenu">
                        <li><a href="#">Editar Usuario</a></li>
                        <li><a href="./LogOut.php">Cerrar Sesion</a></li>
                    </ul>
                </section>
            </section>

            <nav>
                <ul>
                    <li class="categoria">
                        <a href="#">Usuarios</a>
                        <ul class="submenu">
                            <li><a href="#">Alta Usuario</a></li>
                            <li><a href="#">Alta masiva usuarios</a></li>
                        </ul>
                    </li>
                    <li class="categoria">
                        <a href="#">Temáticas</a>
                        <ul class="submenu">
                            <li><a href="#">Alta Temática</a></li>
                        </ul>
                    </li>
                    <li class="categoria">
                        <a href="#">Preguntas</a>
                        <ul class="submenu">
                            <li><a href="#">Alta Pregunta</a></li>
                            <li><a href="#">Alta Masiva Preguntas</a></li>
                        </ul>
                    </li>
                    <li class="categoria">
                        <a href="#">Exámenes</a>
                        <ul class="submenu">
                            <li><a href="#">Alta Examen</a></li>
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
                <a href=""><img id="logo" src="../Recursos/Elmuelle2.png" width="120px" height="80px" alt=""></a>
                <a href=""><img id="perfil" src="../Recursos/perfil.png" width="25px" height="25px" alt=""></a>

                <section class="perfil">
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
                    <li class="categoria"><a href="listadoExamenes.php">Examenes</a>
                    </li>

                </ul>
            </nav>
        </header>
<?php
    }
}
?>
