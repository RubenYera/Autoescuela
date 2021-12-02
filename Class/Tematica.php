<?php
    class Tematica implements jsonSerializable{

        private $id;
        private $nombre;

        public function __construct($nombre){
            $this->nombre=$nombre;
        }

        public function get_id(){
            return $this->id;
        }
        public function set_id($id){
            $this->id=$id;
        }

        public function get_nombre(){
            return $this->nombre;
        }
        public function set_nombre($nombre){
            $this->nombre=$nombre;
        }

        public function jsonSerialize(){
            return [
                'id' => $this->id,
                'nombre' => $this->nombre
            ];
        }
    }
?>