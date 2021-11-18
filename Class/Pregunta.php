<?php
    class Pregunta{

        private $id;
        private $enunciado;
        private $id_RespuestaCorrecta;
        private $recurso;
        private $id_Tematica;

        public function __construct($id,$enunciado,$id_RespuestaCorrecta,$recurso,$id_Tematica){
            $this->id=$id;
            $this->enunciado=$enunciado;
            $this->id_RespuestaCorrecta=$id_RespuestaCorrecta;
            $this->recurso=$recurso;
            $this->id_Tematica=$id_Tematica;
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

        public function get_id_RespuestaCorrecta(){
            return $this->id_RespuestaCorrecta;
        }
        public function set_id_RespuestaCorrecta($id_RespuestaCorrecta){
            $this->id_RespuestaCorrecta=$id_RespuestaCorrecta;
        }

        public function get_recurso(){
            return $this->recurso;
        }
        public function set_recurso($recurso){
            $this->recurso=$recurso;
        }

        public function get_id_Tematica(){
            return $this->id_Tematica;
        }
        public function set_id_Tematica($id_Tematica){
            $this->id_Tematica=$id_Tematica;
        }
    }