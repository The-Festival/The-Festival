<?php
require __DIR__ . '/../repositories/LoginRepository.php';
session_start();


class LoginService {
    public function validateInput($username, $password){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            return $this->checkPassword($username, $password);
        }
    }
    
    private function getUserWithUsername($username){
        $repository = new LoginRepository();
        return $repository->getUserWithUsername($username);
    }
    
    private function checkPassword($username, $password){
        $users = $this->getUserWithUsername($username);

        foreach($users as $user){
            if(password_verify($password, $user->hashedPassword)){
                //password correct
                unset($user->hashedPassword);
                $this->createSession($user);
                return true;
            }
            //password incorrect of single user
            unset($user->hashedPassword);
        }
        //username incorrect or no user with that password
        unset($user->hashedPassword);
        return false;
    }
    
    private function createSession($user){
        $userArray = array($user->userID, $user->username, $user->email);
        $_SESSION['user'] = $userArray;
    }
}