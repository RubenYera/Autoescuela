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

        public static function leeTematica($nombre){
            $resultado = self::$con->query("SELECT * FROM tematica WHERE Nombre='$nombre'");
            $consulta = $resultado->fetch();
            $id = $consulta['ID'];
            $nombre = $consulta['Nombre'];
            $t = new Tematica($nombre);
            $t-> set_id($id);
            return $t;   
        }

        public static function leeTematicas(){
            $tematicas = array();
            $resultado = self::$con->query("SELECT * FROM tematica");
            while ($consulta = $resultado->fetch()) {
            $id = $consulta['ID'];
            $nombre = $consulta['Nombre'];
            $t = new Tematica($nombre);
            $t-> set_id($id);
            $tematicas[] = $t;
            }
            return $tematicas;   
        }

        public static function altaPregunta($pregunta){
            $consulta = self::$con->prepare("Insert into preguntas (Enunciado, Recurso, ID_Tematica) values(:Enunciado, :Recurso, :ID_Tematica)");
            $enunciado=$pregunta->get_enunciado();
            $recurso=$pregunta->get_recurso();
            $Tematica=$pregunta->get_Tematica();
            $ID_Tematica=$Tematica->get_id();
            $consulta->bindParam(":Enunciado",$enunciado);
            $consulta->bindParam(":Recurso",$recurso);
            $consulta->bindParam(":ID_Tematica",$ID_Tematica);
            $consulta->execute();
        }

        public static function grabaRespuestaCorrecta($pregunta,$respuesta){
            $id_pregunta=$pregunta->get_id();
            $id_respuesta=$respuesta->get_id();
            $consulta = self::$con->prepare("UPDATE preguntas SET ID_RespuestaCorrecta = '$id_respuesta' WHERE `preguntas`.`ID` = '$id_pregunta';");

        }

        public static function altaRespuesta($respuesta){
            $consulta = self::$con->prepare("Insert into respuestas (Enunciado, ID_Pregunta) values(:Enunciado, :ID_Pregunta)");
            $enunciado=$respuesta->get_enunciado();
            $ID_Pregunta=$respuesta->get_pregunta();
            $ID_Pregunta=$ID_Pregunta->get_id();
            $consulta->bindParam(1,$enunciado);
            $consulta->bindParam(2,$ID_Pregunta);
            $consulta->execute();
        }

        public static function leePregunta($id){
            $resultado = self::$con->query("SELECT * FROM preguntas WHERE ID='$id'");
            $consulta = $resultado->fetch();
            $id = $consulta['ID'];
            $enunciado = $consulta['Enunciado'];
            $recurso = $consulta['Recurso'];
            $tematica = $consulta['Tematica'];
            $tematica = $this->leeTematica();
            $P = new Pregunta($enunciado,$tematica,$recurso);
            $P->set_id($id);
            return $P;   
        }

        public static function leePreguntaEnunciado($enunciado){
            $resultado = self::$con->query("SELECT * FROM preguntas WHERE Enunciado='$enunciado'");
            $consulta = $resultado->fetch();
            $id = $consulta['ID'];
            $enunciado = $consulta['Enunciado'];
            $recurso = $consulta['Recurso'];
            $tematica = $consulta['Tematica'];
            $tematica = $this->leeTematica();
            $P = new Pregunta($enunciado,$tematica,$recurso);
            $P->set_id($id);
            return $P;   
        }

        public static function leeRespuesta($enunciado){
            $resultado = self::$con->query("SELECT * FROM respuestas WHERE Enunciado='$enunciado'");
            $consulta = $resultado->fetch();
            $id = $consulta['ID'];
            $enunciado = $consulta['Enunciado'];
            $pregunta = $consulta['ID_Pregunta'];
            $pregunta = leePregunta($pregunta);
            $P = new Pregunta($enunciado,$tematica,$recurso);
            $P->set_id($id);
            return $P;   
        }


    
    }
?>