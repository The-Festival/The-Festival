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
                unset($user->hasedPassword);
                $_SESSION['user'] = serialize($user);
                return true;
            }
                //password incorrect
            unset($user->hasedPassword);
            return false;
        }
        //username incorrect
        return false;
    }

    
    
}