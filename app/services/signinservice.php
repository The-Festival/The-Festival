<?php
require __DIR__ . '/../repositories/signinrepository.php';
require __DIR__ . '/../services/loginservice.php';

class SigninService{
    private $loginService;
    private $signinRepository;

    function __construct(){
        $this->loginService = new LoginService();
        $this->signinRepository = new SigninRepository();
    }

    public function validateInput(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $role = 'customer';
            $date = date("Y-m-d");

            if($this->checkUsernameAndEmail($username, $email)){
                $this->createAccount($username, $email, $password, $role, $date);

                $this->loginService->validateInput($username, $password);
                unset($password);
            }
        }
    }

    private function checkUsernameAndEmail($username, $email){
        $users = $this->signinRepository->checkUsernameAndEmail($username, $email);

        foreach($users as $user){
            if($user->getFullname() == $username || $user->getEmail() == $email){
                header("Location: /signin?errorMessage=email and or username already in use");
                return false;
            }
        }

        return true;
    }

    private function createAccount($username, $email, $password, $role, $date){
        $hashedPassword = $this->hashPassword($password);
        if($this->signinRepository->createAccount($username, $email, $hashedPassword, $role, $date) == false){
            header("Location: /signin?errorMessage=something went wrong creating your account");
        }
    }

    private function hashPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }
}

?>