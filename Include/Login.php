<?php
require_once("./Session.php");
require_once("./BD.php");
require_once("../Class/Usuario.php");

class Login {
    public static function existeUsuario(string $email){
        BD::creaConexion();
        return BD::compruebaUser($email);
    }

    public static function usuarioLogeado(){
        Session::iniciar();
        $u = Session::leer('Usuario');
        if($u===""){
            return false;
        }
        return true;
    }
}

?>