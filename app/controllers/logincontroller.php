<?php
require __DIR__ . '/../services/loginservice.php';

class LoginController{
    private $loginService;

    function __construct()
    {
        $this->loginService = new LoginService();
    }
    public function login(){

        require __DIR__ . '/../views/login/login.php';
    }

    public function loginProgress(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
        
        $model = $this->loginService->checkPassword($usesname, $password);
        }
    }
}