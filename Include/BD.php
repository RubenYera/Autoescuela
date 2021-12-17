<?php
require_once('../Class/Usuario.php');
require_once('../Class/Tematica.php');
require_once('../Class/Pregunta.php');
require_once('../Class/Respuesta.php');
require_once('../Class/Examen.php');
    class BD{

        private static $con;

        public static function creaConexion(){
            self::$con = new PDO('mysql:host=localhost;dbname=autoescuela', 'root', '');
            self::$con->query("set names UTF8");
        }

        public static function leeUsuarios(){
            $resultado = self::$con->query("Select * from usuario");
            $usuarios = array();
            while ($consulta = $resultado->fetch()) {
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
                $u-> set_id($id);
                $usuarios[] = $u;
                }
                return $usuarios;   

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
            $consulta = self::$con->prepare("Insert into usuario (Email, Nombre, Apellidos, Password, FechaNac, Rol, Foto, Activo) values(:Email, :Nombre, :Apellidos, :Password, :FechaNac, :Rol, :Foto, :Activo)");
            $email=$u->get_email();
            $nombre=$u->get_nombre();
            $apellidos=$u->get_apellidos();
            $password=$u->get_password();
            $fechaNac=$u->get_fechaNac();
            $rol=$u->get_rol();
            $foto=$u->get_foto();
            $activo=$u->get_activo();
            $consulta->bindParam(":Email",$email);
            $consulta->bindParam(":Nombre",$nombre);
            $consulta->bindParam(":Apellidos",$apellidos);
            $consulta->bindParam(":Password",$password);
            $consulta->bindParam(":FechaNac",$fechaNac);
            $consulta->bindParam(":Rol",$rol);
            $consulta->bindParam(":Foto",$foto);
            $consulta->bindParam(":Activo",$activo);
            
            $consulta->execute();
    
        }

        public static function actualizaUsuario($u){
            $email= $u->get_email();
            $consulta = self::$con->prepare("Update usuario set `Nombre` = :Nombre, `Apellidos` = :Apellidos, `Password` = :Password, `FechaNac` = :FechaNac, `Rol` = :Rol, `Foto`  = :Foto, `Activo` = :Activo where `Email` = :Email");
            $nombre=$u->get_nombre();
            $apellidos=$u->get_apellidos();
            $password=$u->get_password();
            $fechaNac=$u->get_fechaNac();
            $rol=$u->get_rol();
            $foto=$u->get_foto();
            $activo=$u->get_activo();
            $email=$u->get_email();
            $consulta->bindParam(":Nombre",$nombre);
            $consulta->bindParam(":Apellidos",$apellidos);
            $consulta->bindParam(":Password",$password);
            $consulta->bindParam(":FechaNac",$fechaNac);
            $consulta->bindParam(":Rol",$rol);
            $consulta->bindParam(":Foto",$foto);
            $consulta->bindParam(":Activo",$activo);
            $consulta->bindParam(":Email",$email);
            
            $consulta->execute();
        }

        public static function leeTematica($id){
            $resultado = self::$con->query("SELECT * FROM tematica WHERE ID='$id'");
            $consulta = $resultado->fetch();
            $id = $consulta['ID'];
            $nombre = $consulta['Nombre'];
            $t = new Tematica($nombre);
            $t-> set_id($id);
            return $t;   
        }

        public static function leeTematicaNombre($nombre){
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

        public static function leeExamen($id){
            $resultado = self::$con->query("SELECT * FROM examen where id='$id'");
            $consulta = $resultado->fetch();
            $id = $consulta['ID'];
            $Descripcion = $consulta['Descripcion'];
            $Duracion = $consulta['Duracion'];
            $NPreguntas = $consulta['NPreguntas'];
            $Activo = $consulta['Activo'];
            $e = new Examen($Descripcion,$Duracion,$NPreguntas,$Activo);
            $e-> set_id($id);
            return $e;   
        }

        public static function leeExamenDescripcion($Descripcion){
            $resultado = self::$con->query("SELECT * FROM examen where Descripcion='$Descripcion'");
            $consulta = $resultado->fetch();
            $id = $consulta['ID'];
            $Descripcion = $consulta['Descripcion'];
            $Duracion = $consulta['Duracion'];
            $NPreguntas = $consulta['NPreguntas'];
            $Activo = $consulta['Activo'];
            $e = new Examen($Descripcion,$Duracion,$NPreguntas,$Activo);
            $e-> set_id($id);
            return $e;   
        }

        public static function altaExamen($examen){
            $consulta = self::$con->prepare("Insert into examen (Descripcion, Duracion, NPreguntas, Activo) values(:Descripcion, :Duracion, :NPreguntas, :Activo)");
            $Descripcion = $examen->get_descripcion();
            $Duracion = $examen->get_duracion();
            $NPreguntas = $examen->get_nPreguntas();
            $Activo = $examen->get_activo();
            $consulta->bindParam(":Descripcion",$Descripcion);
            $consulta->bindParam(":Duracion",$Duracion);
            $consulta->bindParam(":NPreguntas",$NPreguntas);
            $consulta->bindParam(":Activo",$Activo);
            $consulta->execute();
        }

        public static function altaExamen_Pregunta($examen,$pregunta){
            $consulta = self::$con->prepare("Insert into examen_pregunta (ID_Examen,ID_Pregunta) values(:ID_Examen, :ID_Pregunta)");
            $ID_Examen = $examen->get_id();
            $ID_Pregunta = $pregunta->get_id();

            $consulta->bindParam(":ID_Examen",$ID_Examen);
            $consulta->bindParam(":ID_Pregunta",$ID_Pregunta);
            $consulta->execute();
        }

        public static function obtienePreguntasExamen($idExamen){
            $preguntas = array();
    
            $resultado = self::$con->query("Select ID_Pregunta from examen_pregunta where id_examen=$idExamen");
            while ($consulta = $resultado->fetch()) {
                $id = $consulta['ID_Pregunta'];
                $p = BD::leePregunta($id);
                $preguntas[]=$p;
            }
            return $preguntas;
    
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

        public static function grabaRespuestaCorrecta($respuesta){
            $id_pregunta=$respuesta->get_pregunta();
            $id_pregunta=$id_pregunta->get_id();
            $id_respuesta=$respuesta->get_id();
            $consulta = self::$con->prepare("UPDATE preguntas SET ID_RespuestaCorrecta = '$id_respuesta' WHERE ID = '$id_pregunta'");
            $consulta->execute();
        }

        public static function altaRespuesta($respuesta){
            $consulta = self::$con->prepare("Insert into respuestas (Enunciado, ID_Pregunta) values(:Enunciado, :ID_Pregunta)");
            $enunciado=$respuesta->get_enunciado();
            $ID_Pregunta=$respuesta->get_pregunta();
            $ID_Pregunta=$ID_Pregunta->get_id();
            $consulta->bindParam(":Enunciado",$enunciado);
            $consulta->bindParam(":ID_Pregunta",$ID_Pregunta);
            $consulta->execute();
        }

        public static function leePregunta($id){
            $resultado = self::$con->query("SELECT * FROM preguntas WHERE ID='$id'");
            $consulta = $resultado->fetch();
            $id = $consulta['ID'];
            $enunciado = $consulta['Enunciado'];
            $recurso = $consulta['Recurso'];
            $id_tematica = $consulta['ID_Tematica'];
            $tematica = self::leeTematica($id_tematica);
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
            $tematica = $consulta['ID_Tematica'];
            $tematica = self::leeTematica($tematica);
            $P = new Pregunta($enunciado,$tematica,$recurso);
            $P->set_id($id);
            return $P;   
        }

        public static function leePreguntas(){
            $preguntas = array();
            $resultado = self::$con->query("SELECT * FROM preguntas");
            while ($consulta = $resultado->fetch()) {
                $id = $consulta['ID'];
                $enunciado = $consulta['Enunciado'];
                $recurso = $consulta['Recurso'];
                $tematica = self::leeTematica($consulta['ID_Tematica']);
                $p=new Pregunta($enunciado,$tematica,$recurso);
                $p->set_id($id);
                $preguntas[] = $p;
            }
            return $preguntas;
        }

        public static function leeRespuestaPregunta($id_pregunta){
            $respuestas = array();
            $resultado = self::$con->query("SELECT * FROM respuestas WHERE ID_Pregunta='$id_pregunta'");
            while ($consulta = $resultado->fetch()) {
            $id = $consulta['ID'];
            $enunciado = $consulta['Enunciado'];
            $pregunta = $consulta['ID_Pregunta'];
            $pregunta = self::leePregunta($pregunta);
            $r = new Respuesta($enunciado,$pregunta);
            $r->set_id($id);
            $respuestas[] = $r;
            }
            return $respuestas;   
        }

        public static function leeRespuestaEnunciado($enunciado){
            $resultado = self::$con->query("SELECT * FROM respuestas WHERE Enunciado='$enunciado'");
            $consulta = $resultado->fetch();
            $id = $consulta['ID'];
            $enunciado = $consulta['Enunciado'];
            $pregunta = $consulta['ID_Pregunta'];
            $pregunta = self::leePregunta($pregunta);
            $r = new Respuesta($enunciado,$pregunta);
            $r->set_id($id);
            return $r;   
        }

        public static function altaTematica($tematica){
            $consulta = self::$con->prepare("Insert into tematica (Nombre) values(:Nombre)");
            $nombre=$tematica->get_nombre();
            $consulta->bindParam(":Nombre",$nombre);
            $consulta->execute();  
        }

        public static function obtieneTablaJSON($t,$pag, $limit){    
            $res = self::$con->query("Select * from $t limit $limit offset $pag");
    
            if($res!=null){
                $filas = $res->fetchAll(PDO::FETCH_ASSOC);
                return json_encode($filas);
            }
        }

        public static function obtieneFilas($tabla){    
            $res = self::$con->query("SELECT count(*) FROM $tabla");
    
            if($res != false){
                $registro = $res->fetchColumn();
                return (int)$registro;
            }
        }
    
    }
?>