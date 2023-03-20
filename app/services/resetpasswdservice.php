<?php

require __DIR__ . '/../repositories/newPasswordRepository.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class resetpasswdservice{

    private $rndCode;
    private $repository;

    function generateCode(){
        $rndCode = rand(100000, 999999);
        return $rndCode;
    }
    
    function checkEmail($email){
        $repository = new newPasswordRepository();
        return $repository->checkEmail($email);
    }

    function newPassword($password, $email){
        $repository = new newPasswordRepository();
        $repository->newPassword($password, $email);
    }

    function sendMail($rndCode, $email) {
        require '../vendor/autoload.php';

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
            $mail->SMTPDebug = 0;                                       
                                                                        
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                       
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'festivalcrisis@gmail.com';             
            $mail->Password   = 'vfsidcwlbhtqolop';                         
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
            $mail->Port       = 465;                                   
        
            //Recipients
            $mail->setFrom('festivalcrisis@gmail.com', 'The Festival organization');                                                 
            $mail->addAddress($email);           

            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = 'Reset your password';
            $mail->Body    = 'Your code: <b>' . $rndCode . '</b>';
            $mail->AltBody = 'Your code: $rndCode';
        
            $mail->send();

        } catch (Exception $e) {
        }
    }
}

?>