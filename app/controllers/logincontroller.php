<?php
require __DIR__ . '/../services/loginservice.php';

class LoginController{
    private $loginService;

    function __construct()
    {
        $this->loginService = new LoginService();
    }
    public function index(){
        require __DIR__ . '/../views/login/login.php';
    }

    public function loginVerification(){
            $model = $this->loginService->validateInput($_POST['username'], $_POST['password']);
            if($model == true){
                header("Location: http://localhost/home");
                return;
            }
            header("Location: http://localhost/login?errorMessage=password or username wrong");
    }

    public function logout(){
        session_destroy();
        header("Location: http://localhost/home");
    }
}