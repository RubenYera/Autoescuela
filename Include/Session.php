<?php
class Session{
    
    public static function iniciar(){
        if(!isset($_SESSION)){
            session_start();
        }
    }

    public static function leer($codigo){
        return isset($_SESSION[$codigo])?$_SESSION[$codigo]:"";
    }

    public static function existe($codigo){
        return isset($_SESSION[$codigo])?true:false;
    }

    public static function escribir($codigo,$valor){
        $_SESSION[$codigo]=$valor;
    }

    public static function eliminar($codigo){
        unset($_SESSION[$codigo]);
    }

    public static function destruir(){
        session_destroy();
    }
}
?>