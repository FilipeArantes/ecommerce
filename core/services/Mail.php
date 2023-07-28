<?php

namespace core\services;

use core\services\PHPMailer\PHPMailer;
use Exception;

class Mail
{
    private $email;
    private $senha;
    private $enviadoPor;

    public function __construct(string $email, string $senha, string $enviadoPor)
    {
        $this->email = $email;
        $this->senha = $senha;
        $this->enviadoPor = $enviadoPor;
    }

    public function sendEmail(string $enviarPara, string $tituloEmail, string $corpoEmail): bool
    {
        $mail = new PHPMailer();

        try {
            $mail->SMTPDebug = false;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->Mailer = 'smtp';
            $mail->CharSet = PHPMailer::CHARSET_UTF8;

            $mail->SMTPAuth = true;
            $mail->Username = $this->email;
            $mail->Password = $this->senha;

            $mail->setFrom($this->email, $this->enviadoPor);
            $mail->addAddress($enviarPara, "joaquina");

            $mail->isHTML(true);
            $mail->Subject = $tituloEmail;
            $mail->Body = $corpoEmail;

            return $mail->send();
        } catch (Exception $e) {
            throw $e;
        }
    }
}