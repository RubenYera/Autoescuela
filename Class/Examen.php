<?php
    class Examen implements jsonSerializable{
        private $id;
        private $descripcion;
        private $duracion;
        private $nPreguntas;
        private $activo;

        public function __construct($descripcion,$duracion,$nPreguntas,$activo=0){
            $this->descripcion=$descripcion;
            $this->duracion=$duracion;
            $this->nPreguntas=$nPreguntas;
            $this->activo=$activo;
        }

        public function get_id(){
            return $this->id;
        }
        public function set_id($id){
            $this->id=$id;
        }

        public function get_descripcion(){
            return $this->descripcion;
        }
        public function set_descripcion($descripcion){
            $this->descripcion=$descripcion;
        }

        public function get_duracion(){
            return $this->duracion;
        }
        public function set_duracion($duracion){
            $this->duracion=$duracion;
        }

        public function get_nPreguntas(){
            return $this->nPreguntas;
        }
        public function set_nPreguntas($nPreguntas){
            $this->nPreguntas=$nPreguntas;
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
    }
?>