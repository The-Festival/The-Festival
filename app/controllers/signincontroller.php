<?php
require __DIR__ . '/../services/signinservice.php';

class SigninController{
    public function index(){
        require __DIR__ . '/../views/login/signin.php';
    }

}
?>