<?php
require_once('../Class/Usuario.php');
require_once('../Class/Tematica.php');
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
            $u = new Usuario($email,$nombre,$apellidos,$password,$fechaNac,$rol,$foto,$activo);
            $u->set_id($id);
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



        public static function altaUser(Usuario $u){
            $consulta = self::$con->prepare("Insert into usuario (Email, Nombre, Apellidos, Password, FechaNac, Rol, Foto, Activo) values(:Email, :nombre, :Apellidos, :Password, :FechaNac, :Rol, :Foto, :Activo)");
            $email=$u->get_email();
            $nombre=$u->get_nombre();
            $apellidos=$u->get_apellidos();
            $password=$u->get_password();
            $fechaNac=$u->get_fechaNac();
            $rol=$u->get_rol();
            $foto=$u->get_foto();
            $activo=$u->get_activo();
            $consulta->bindParam(1,$email);
            $consulta->bindParam(2,$nombre);
            $consulta->bindParam(3,$apellidos);
            $consulta->bindParam(4,$password);
            $consulta->bindParam(5,$fechaNac);
            $consulta->bindParam(6,$rol);
            $consulta->bindParam(7,$foto);
            $consulta->bindParam(8,$activo);
            
            $consulta->execute();
    
        }

        public static function leeTematica($tematica){
            $resultado = self::$con->query("SELECT * FROM Tematica WHERE Nombre='$tematica'");
            $consulta = $resultado->fetch();
            $id = $consulta['ID'];
            $nombre = $consulta['Nombre'];
            $t = new Tematica($nombre);
            $t-> set_id($id);
            return $t;   
        }
    }
?>