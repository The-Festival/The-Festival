<?php
require __DIR__ . '/../services/passwdresetservice.php';

class resetpasswdcontroller{
    private $passwdService;

    function __construct(){
        $this->passwdService = new passwdresetservice();
    }

    public function index(){
        if (isset($_POST['buttonResetPasswd']))
        {
            $email = htmlspecialchars($_POST['email']);
            $SESSION['email'] = $email;
            try{
                $this->passwdService->sendMail($email);
                header("Location: http://localhost/resetpasswdcontroller/newpasswd");
                return;
            }
            catch(Exception $e){
                header("Location: http://localhost/resetpasswd?errorMessage=Email not found");
            }
            header("Location: http://localhost/resetpasswd?errorMessage=password or username wrong");
        }
        require __DIR__ . '/../views/login/resetpasswd.php';
    }
    public function newpasswd(){
        require __DIR__ . '/../views/login/newpasswd.php';
    }
}