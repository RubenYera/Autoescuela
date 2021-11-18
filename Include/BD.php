<?php
require_once('../Class/Usuario.php');
    class BD{

        private static $con;

        public static function creaConexion(){
            self::$con = new PDO('mysql:host=localhost;dbname=autoescuela', 'root', '');
        }

        public static function obtieneUser($email){
            $resultado = self::$con->query("SELECT * FROM usuario WHERE Email='$email'");
            $consulta = $resultado->fetch();
            $id = $consulta['ID'];
            $email = $consulta['Email'];
            $nombre = $consulta['Nombre'];
            $apellidos = $consulta['Apellidos'];
            $password = $consulta['Password'];
            $fechaNac = $consulta['FechaNac'];
            $rol = $consulta['Rol'];
            $foto = $consulta['Foto'];
            $activo = $consulta['Activo'];
            $u = new Usuario($id,$email,$nombre,$apellidos,$password,$fechaNac,$rol,$foto,$activo);
            return $u;
        }

        public static function compruebaUser($email){
            $resultado = self::$con->query("SELECT * FROM usuario WHERE Email ='$email'");
            $consulta = $resultado->fetch();
            if($consulta!=0){
                return true;
            }
            return false;
        }

    }
?>