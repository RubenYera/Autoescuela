<?php
    class Tematica{
        private $id;
        private $enunciado;
        private $pregunta;

        public function __construct($id,$enunciado,$pregunta){
            $this->id=$id;
            $this->enunciado=$enunciado;
            $this->pregunta=$pregunta;
        }

        public function get_id(){
            return $this->id;
        }
        public function set_id($id){
            $this->id=$id;
        }

        public function get_enunciado(){
            return $this->enunciado;
        }
        public function set_enunciado($enunciado){
            $this->enunciado=$enunciado;
        }

        public function get_pregunta(){
            return $this->pregunta;
        }
        public function set_pregunta($pregunta){
            $this->pregunta=$pregunta;
        }

    }
?>