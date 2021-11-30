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

        public static function leeTematicas(){
            $tematicas = array();
            $resultado = self::$con->query("SELECT * FROM Tematica");
            while ($consulta = $resultado->fetch()) {
            $id = $consulta['ID'];
            $nombre = $consulta['Nombre'];
            $t = new Tematica($nombre);
            $t-> set_id($id);
            $tematicas[] = $t;
            }
            return $tematicas;   
        }

        public static function altaPregunta($pregunta,$correcta,$tematica){
            $consulta = self::$con->prepare("Insert into Pregunta (Enunciado, ID_RespuestaCorrecta, Recurso, ID_Tematica) values(:Enunciado, :ID_RespuestaCorrecta, :Recurso, :ID_Tematica)");
            $enunciado=$pregunta->get_enunciado();
            $ID_RespuestaCorrecta=$correcta->get_id();
            $recurso=$pregunta->get_recurso();
            $ID_Tematica=$tematica->get_id();
            $consulta->bindParam(1,$enunciado);
            $consulta->bindParam(2,$ID_RespuestaCorrecta);
            $consulta->bindParam(3,$recurso);
            $consulta->bindParam(4,$ID_Tematica);
           
            $consulta->execute();
        }
    }
?>