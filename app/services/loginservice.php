<?php
require __DIR__ . '/../repositories/LoginRepository.php';
session_start();


class LoginService {
    public function checkUser($username){
        $repository = new LoginRepository();
        return $repository->checkUser($username);
    }

    public function checkPassword($username, $password){
        $users = $this->checkUser($username);

        foreach($users as $user){
            if(password_verify($password, $user->hashedPassword)){
                //password correct
                $_SESSION['user'] = serialize($user);
                header("Location: http://www.example.com/another-page.php");
                return ;
            }
                //password incorrect

            header("Location:login");
            return ;
        }
        //username incorrect
        header("Location:login");
    }

    
    
}