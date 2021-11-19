<?php
    class Examen_Hecho{
        private $id;
        private $Examen;
        private $Alumno;
        private $fecha;
        private $calificacion;
        private $ejecucion;

        public function __construct($id,$Examen,$Alumno,$fecha,$calificacion,$ejecucion){
            $this->id=$id;
            $this->Examen=$Examen;
            $this->Alumno$Alumno=$Alumno;
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

        public function get_Examen(){
            return $this->Examen;
        }
        public function set_Examen($Examen){
            $this->Examen=$Examen;
        }

        public function get_Alumno$Alumno(){
            return $this->Alumno$Alumno;
        }
        public function set_Alumno$Alumno($Alumno){
            $this->Alumno$Alumno=$Alumno;
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