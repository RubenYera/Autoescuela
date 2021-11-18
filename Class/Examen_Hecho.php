<?php
    class Examen_Hecho{
        private $id;
        private $id_Examen;
        private $id_Alumno;
        private $fecha;
        private $calificacion;
        private $ejecucion;

        public function __construct($id,$id_Examen,$id_Alumno,$fecha,$calificacion,$ejecucion){
            $this->id=$id;
            $this->id_Examen=$id_Examen;
            $this->id_Alumno=$id_Alumno;
            $this->fecha=$fecha;
            $this->calificacion=$calificacion;
            $this->ejecucion=$ejecucion;
        }

        public function get_id(){
            return $this->id;
        }
        public function set_id($id){
            $this->id=$id;
        }

        public function get_id_Examen(){
            return $this->id_Examen;
        }
        public function set_id_Examen($id_Examen){
            $this->id_Examen=$id_Examen;
        }

        public function get_id_Alumno(){
            return $this->id_Alumno;
        }
        public function set_id_Alumno($id_Alumno){
            $this->id_Alumno=$id_Alumno;
        }

        public function get_fecha(){
            return $this->fecha;
        }
        public function set_fecha($fecha){
            $this->fecha=$fecha;
        }

        public function get_calificacion(){
            return $this->calificacion;
        }
        public function set_calificacion($calificacion){
            $this->calificacion=$calificacion;
        }

        public function get_ejecucion(){
            return $this->ejecucion;
        }
        public function set_ejecucion($ejecucion){
            $this->ejecucion=$ejecucion;
        }
    }
?>