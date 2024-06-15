<?php
//Implementación PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PlantillaControlador
{
    //método para invocar la plantilla
    public function plantilla()
    {

        include 'vistas/plantilla.php';

    }

    //metodo para crear url
    static public function url()
    {
        return "https://controlstock.com.ar/burns/";
    }

    static public function enviarEmail($name, $subject, $email, $message, $url, $email_envio, $nombre_envio)
    {
        date_default_timezone_set("America/Argentina/Buenos_Aires");

        $mail = new PHPMailer;

        try {
            $mail->CharSet = 'UTF-8';
            $mail->isMail();
            $mail->setFrom($email_envio, $nombre_envio);
            $mail->Subject = "Hola " . $name . " - " . $subject;
            $mail->addAddress($email);
            $mail->msgHTML(' 
			<div>
				Hola, ' . $name . ':
				<p>' . $message . '</p>
				<a href="' . $url . '">Click aquí para ingresar</a><br><br>
				Si no esperabas este mensaje, puedes eliminarlo.
			</div>
		');
            $send = $mail->Send();
            if (!$send) {
                return $mail->ErrorInfo;
            } else {
                return "ok";
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}