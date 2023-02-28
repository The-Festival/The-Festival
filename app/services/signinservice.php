<?php
require __DIR__ . '/../repositories/signinrepository.php';
session_start();

class SigninService{
    public function validateInput(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            if($this->checkUsernameAndEmail($username, $email)){
                $this->createAccount($username, $email, $password);
                unset($password);

                $loginService = new LoginService();
                $loginService->validateInput($username, $password);
            }
        }
    }

    private function checkUsernameAndEmail($username, $email){
        $repository = new SigninRepository();
        $users = $repository->checkUsernameAndEmail($username, $email);

        foreach($users as $user){
            if($user->username == $username || $user->email == $email){
                header('Location: https:localhost/signin?errorMessage=email and/or username already in use or ');
                return false;
            }
        }

        return true;
    }

    private func+tion createAccount($username, $email, $password){
        $repository = new SigninRepository();
        $hashedPassword = $this->hashPassword($password);
        if($repository->createAccount($username, $email, $hashedPassword) == false){+
  +          header('Location: https:localhost/signin?errorMessage=something went wrong creating your account');
        }
    }

    private function hashPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }
}

?>