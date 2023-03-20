<?php
require __DIR__ . '/../repositories/LoginRepository.php';


class LoginService {
    public function checkUser($username){
        $repository = new LoginRepository();
        return $repository->checkUser($username);
    }

    public function validateInput(){
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        if($this->checkPassword($username, $password)){
            header("Location: /home");
            return;
        }
        header("Location: /login?errorMessage=password or username wrong"); 
            
    }

    public function checkPassword($username, $password){
        $users = $this->checkUser($username);

        foreach($users as $user){
            if(password_verify($password, $user->getHashedPassword())){
                //password correct
                //unset($user->getHashedPassword());
                // $array = array($user->userID, $user->username, $user->email);
                $_SESSION['user'] = serialize($user);
                return true;
            }
                //password incorrect
            //unset($user->getHashedPassword());
            return false;
        }
                //username incorrect
        return false;
    }

    public function logout(){
        session_destroy();
    }
    
}
?>