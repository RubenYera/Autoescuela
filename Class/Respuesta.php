<?php
    class Tematica{
        private $id;
        private $enunciado;
        private $id_Pregunta;

        public function __construct($id,$enunciado,$id_Pregunta){
            $this->id=$id;
            $this->enunciado=$enunciado;
            $this->id_Pregunta=$id_Pregunta;
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

        public function get_id_Pregunta(){
            return $this->id_Pregunta;
        }
        public function set_id_Pregunta($id_Pregunta){
            $this->id_Pregunta=$id_Pregunta;
        }

    }
?>