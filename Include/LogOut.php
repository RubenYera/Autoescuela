<?php
include_once("Session.php");
include_once("../CLass/Usuario.php");

    Session::Iniciar();
    var_dump($_SESSION);
    if(!isset($_SESSION['Usuario'])){
        header("Location: Loginform.php");
    }

    Session::eliminar("Usuario");
    Session::destruir();
    header("Location: Loginform.php");

?>