<?php

use PHPMailer\PHPMailer\PHPMailer;
require "../vendor/autoload.php";

class correo{
    private static $mail;

    private static function opcionesCorreo(){
        self::$mail = new PHPMailer();
        self::$mail->IsSMTP();
        self::$mail->SMTPDebug  = 0;
        self::$mail->SMTPAuth   = true;
        self::$mail->SMTPSecure = "tls";
        self::$mail->Host= "smtp.gmail.com";
        self::$mail->Port= 587;

    }

    public static function enviarCorreo($user, $password, $titulo, $asunto, $html, $direccion, $adjuntos = ""){
        self::opcionesCorreo();

        // introducir usuario de google
        self::$mail->Username   = $user;
        // introducir clave
        self::$mail->Password   = $password;
        self::$mail->SetFrom($user, $titulo);
        // asunto
        self::$mail->Subject = $asunto;
        // cuerpo
        self::$mail->MsgHTML($html);
        // adjuntos
        self::$mail->AddEmbeddedImage($adjuntos, 'archivo');
        // destinatario
        self::$mail->AddAddress($direccion, "Test");
        // enviar
        $resul = self::$mail->Send();

        if($resul) {
            echo "Error" . self::$mail->ErrorInfo;
            } else {
            echo "Enviado";
        }

    }
}