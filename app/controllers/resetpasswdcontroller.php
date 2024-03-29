<?php
require __DIR__ . '/../services/resetpasswdservice.php';

class resetpasswdcontroller{
    private $passwdService;
    private $rndCode;

    function __construct(){
        $this->passwdService = new resetpasswdservice();
    }

    public function index(){
        if (isset($_POST['buttonReset']))
        {
            $email = htmlspecialchars($_POST['email']);
            
            if ($this->passwdService->checkEmail($email) == false){
                header("Location: http://localhost/resetpasswd?errorMessage=Email not found");
            }
            else{
                $_SESSION['email'] = $email;
                try{
                    // random nummer genereren om nieuw wachtwoord te kunnen instellen
                    $rndCode = $this->passwdService->generateCode();
                    $_SESSION['rndCode'] = $rndCode;
                    $this->passwdService->sendMail($rndCode, $email);
                    $this->checkCode();
                    return;
                }
                catch(Exception $e){
                    header("Location: http://localhost/resetpasswd?errorMessage=Email not found");
                }
            header("Location: http://localhost/resetpasswd?errorMessage=password or username wrong");
            }
        }
        require __DIR__ . '/../views/login/resetpasswd.php';
    }

    public function checkCode(){
        if (isset($_POST['buttonCheck']))
        {
            $code = htmlspecialchars($_POST['code']);

            if ($_SESSION['rndCode'] == $code){
                $this->newpasswd();
                return;
            }
        }
        require __DIR__ . '/../views/login/checkcode.php';
    }

    public function newpasswd(){
        if (isset($_POST['buttonNewPasswd']))
        {
            $password = htmlspecialchars($_POST['password']);
            $password2 = htmlspecialchars($_POST['password2']);

            if ($password == $password2){
                if(strlen($password) < 7){
                    require __DIR__ . '/../views/login/newpasswd.php';
                }
                else{
                    $this->passwdService->newPassword($password, $_SESSION['email']);
                    require __DIR__ . '/../views/login/login.php';
                    return;
                }
            }
        }
        require __DIR__ . '/../views/login/newpasswd.php';
    }
}