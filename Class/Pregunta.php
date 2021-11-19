<?php
    class Pregunta{

        private $id;
        private $enunciado;
        private $RespuestaCorrecta;
        private $recurso;
        private $Tematica;
        private $Respuestas;

        public function __construct($id,$enunciado,$RespuestaCorrecta,$recurso,$Tematica){
            $this->id=$id;
            $this->enunciado=$enunciado;
            $this->RespuestaCorrecta=$RespuestaCorrecta;
            $this->recurso=$recurso;
            $this->Tematica=$Tematica;
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

        public function get_RespuestaCorrecta(){
            return $this->RespuestaCorrecta;
        }
        public function set_RespuestaCorrecta($RespuestaCorrecta){
            $this->RespuestaCorrecta=$RespuestaCorrecta;
        }

        public function get_recurso(){
            return $this->recurso;
        }
        public function set_recurso($recurso){
            $this->recurso=$recurso;
        }

        public function get_Tematica(){
            return $this->Tematica;
        }
        public function set_Tematica($Tematica){
            $this->Tematica=$Tematica;
        }

        public function get_Respuestas(){
            return $this->Respuestas;
        }
        public function set_Respuestas($Respuestas){
            $this->Respuestas=$Respuestas;
        }
    }