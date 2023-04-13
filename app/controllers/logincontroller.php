<?php
require __DIR__ . '/../services/loginservice.php';

class LoginController
{

    private $loginService;

    function __construct()
    {

        $this->loginService = new LoginService();
    }
    public function index()
    {
        require __DIR__ . '/../views/login/login.php';
    }

    public function loginProgress()
    {
        $this->loginService->validateInput();
    }

    public function signin()
    {
        require __DIR__ . '/../views/login/signin.php';
    }

    public function logout()
    {
        $this->loginService->logout();
        header("Location: /home");
    }
}
