<?php
require __DIR__ . '/../repositories/LoginRepository.php';

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
                    session_start();
                    $_SESSION['user'] = serialize($user);
                    header("Location:home");
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