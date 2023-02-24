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

    public function loginProgress(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
        
            $model = $this->loginService->checkPassword($username, $password);
            if($model == true){
                header("Location: http://localhost/home");
                return;
            }
            header("Location: http://localhost/login?errorMessage=password or username wrong");
        }
    }
}