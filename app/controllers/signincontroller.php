<?php
require __DIR__ . '/../services/signinservice.php';

class SigninController{
    private $signinService;

    function __construct(){
        $this->signinService = new SigninService();
    }

    public function index(){
        require __DIR__ . '/../views/login/signin.php';
    }

    public function signinVerification(){
        $model = $this->signinService->validateInput();
    }
}
?>