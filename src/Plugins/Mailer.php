<?php

namespace App\Plugins;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    protected $mail;

    public function __construct($config)
    {
        $this->mail = new PHPMailer(true);
        // $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host      = $config->host;                        //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = $config->username;                     //SMTP username
        $this->mail->Password   = $config->password;                               //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $this->mail->Port       = $config->port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $this->mail->CharSet = "utf-8";
        $this->mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
    }

    public function send(string $adress, string $name, string $subject, string $message):void
    {
        $this->mail->setFrom('realtor@realtor.com', 'Mailer');
        $this->mail->addAddress($adress, $name);
        $this->mail->addReplyTo('info@example.com', 'Information');
        $this->mail->addCC($adress);
        $this->mail->isHTML(true);                                  //Set email format to HTML
        $this->mail->Subject =  $subject;
        $this->mail->Body    =  $message;
        $this->mail->AltBody = 'Спасибо, что работате с нами';
        // try {
            $this->mail->send();
        // } catch (Exception $e) {
        //     var_dump($this->mail->ErrorInfo);
        // }
    }
}
