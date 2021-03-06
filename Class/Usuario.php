<?php
    class Usuario implements jsonSerializable{
        private $id;
        private $email;
        private $nombre;
        private $apellidos;
        private $password;
        private $fechaNac;
        private $rol;
        private $foto;
        private $activo;
        
        public function __construct($email,$nombre,$apellidos,$password,$fechaNac,$rol,$foto="",$activo=1){
            $this->email=$email;
            $this->nombre=$nombre;
            $this->apellidos=$apellidos;
            $this->password=$password;
            $this->fechaNac=$fechaNac;
            $this->foto=$foto;
            $this->rol=$rol;
            $this->activo=$activo;
        }

        public function get_id(){
            return $this->id;
        }

        public function set_id($id){
            $this->id=$id;
        }

        public function get_email(){
            return $this->email;
        }

        public function set_email($email){
            $this->email=$email;
        }

        public function get_nombre(){
            return $this->nombre;
        }

        public function set_nombre($nombre){
            $this->nombre=$nombre;
        }

        public function get_apellidos(){
            return $this->apellidos;
        }

        public function set_apellidos($apellidos){
            $this->apellidos=$apellidos;
        }

        public function get_password(){
            return $this->password;
        }

        public function set_password($password){
            $this->password=$password;
        }

        public function get_fechaNac(){
            return $this->fechaNac;
        }

        public function set_fechaNac($fechaNac){
            $this->fechaNac=$fechaNac;
        }

        public function get_rol(){
            return $this->rol;
        }

        public function set_rol($rol){
            $this->rol=$rol;
        }

        public function get_foto(){
            return $this->foto;
        }

        public function set_foto($foto){
            $this->foto=$foto;
        }

        public function get_activo(){
            return $this->activo;
        }

        public function set_activo($activo){
            $this->activo=$activo;
        }

        public function jsonSerialize(){

            $vars = get_object_vars($this);

            return $vars;
        }

        // public function jsonSerialize(){
        //     $k = 1;
        //     return [
        //         'id' => $this->id,
        //         'email' => $this->email,
        //         'nombre' => $this->nombre,
        //         'apellidos' => $this->apellidos,
        //         'password' => $this->password,
        //         'fechaNac' => $this->fechaNac,
        //         'rol' => $this->rol,
        //         'foto' => $this->foto,
        //         'activo' => $this->activo
        //     ];
        // }

    }
?>