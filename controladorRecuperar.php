<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


require_once './phpmailer/src/Exception.php';
require_once './phpmailer/src/PHPMailer.php';

require_once './phpmailer/src/SMTP.php';
require_once './Auxiliar/AccesoADatos.php';


$mail = new PHPMailer();
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Host de conexión SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'AuxiliarDAW2@gmail.com';                 // Usuario SMTP
    $mail->Password = 'Chubaca20';                           // Password SMTP
    $mail->SMTPSecure = 'ssl';                            // Activar seguridad TLS
    $mail->Port = 465;                                    // Puerto SMTP

    $mail->setFrom('AuxiliarDAW2@gmail.com');  // Mail del remitente
    $mail->addAddress($_REQUEST['email']);     // Mail del destinatario

    $mail->isHTML(true);
    $mail->Subject = 'Cambio de contraseña';  // Asunto del mensaje
    $mail->Body = '1234';    // Contenido del mensaje (acepta HTML)

    $mail->send();
    if(AccesoADatos::cambiarPassword($_REQUEST['email'])){
        $_SESSION['mensaje'] = 'Te hemos enviado un correo con tu nueva contraseña';
    }else{
        $_SESSION['mensaje'] = 'No se ha podido cambiar la contraseña';
    }
    
    
    header('Location: index.php');
} catch (Exception $e) {
    echo 'El mensaje no se ha podido enviar, error: ', $mail->ErrorInfo;
}




