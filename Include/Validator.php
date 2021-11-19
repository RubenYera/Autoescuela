<?php
    class Validator{
    //Array de errores
    public $errores;

    //Constructor
    public function __construct(){
        $this->errores=array();
    }

    /**
     * Comprueba si hay errores
     *
     * @return void
     */
    public function ValidacionPasada(){
        if(count($this->errores)!=0){
            return false;
        }
        return true;
    }

    /**
     * Comprueba si el campo tiene algun error
     *
     * @return void
     */
    public function ErrorCampo($campo){
        if(isset($errores[$campo])){
            return false;
        }
        return true;
    }

    public function ImprimirError($campo){
        return isset($this->errores[$campo])?'<span class="error_mensaje">'.$this->errores[$campo].'</span>':'';
    }

    public function getValor($campo){
        return isset($campo)?$campo:'';
    }

    public function getSelected($campo,$valor){
        return isset($campo) && $campo==$valor?'selected':'';
    }

    public function getChecked($campo,$valor){
        return isset($campo) && $campo==$valor?'checked':'';
    }

    public function Dni($campo){
        $letras="TRWAGMYFPDXBNJZSQVHLCKE";
        $mensaje="";
        if(preg_match("/^[0-9]{8}[a-zA-z]{1}$/",$campo)==1){
            $numero=substr($campo,0,8);
            $letra=substr($campo,8,1);
            if($letras[$numero%23]==strtoupper($letra)){
                return TRUE;
            }
            else{
                $mensaje="El campo $campo es un Dni con letra no válida";
            }
        }
        else{
            $mensaje="El campo $campo no es un Dni válido";
        }
        $this->errores[$campo]=$mensaje;
        return FALSE;
    }

    /**
     * Comprueba si el campo es un email válido
     *
     * @param [String] $campo
     * @return boolean
     */
    public function Email($campo){
        if(!filter_var($campo,FILTER_VALIDATE_EMAIL)){
            $this->errores[$campo]="Debe ser un email válido";
            return false; 
        }
        return true;
    }

    /**
     * Comprueba si esta vacio
     *
     * @param [type] $campo
     * @return boolean
     */ 
    public function Requerido($campo){
        if(!isset($campo) || empty($campo)){
            $this->errores[$campo]="El campo $campo no puede estar vacio";
            return false;
        }
        return true;
    }

    /**
     * Método que comprueba el número de caracteres de la cadena
     * entre un mínimo y un máximo
     *
     * @param [String] $campo
     * @param [integer] $max
     * @param integer $min
     * @return boolean
     */
    public function CadenaRango($campo,$max,$min=0){
        if(!(strlen($campo)>$min && strlen($campo)<$max)){
            $this->errores[$campo]="Debe tener entre $min y $max caracteres";
            return false;
        }
        return true;

    }
}
?>