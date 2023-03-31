<?php

class User {
    private int $user_id;
    private string $fullname;
    private string $email;
    private string $password;
    private string $role;
    private string $registration_date ;

    public function getUserID(){
        return $this->user_id;
    }
    public function getFullname(){
        return $this->fullname;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getHashedPassword(){
        return $this->password;
    }
    public function getRole(){
        return $this->role;
    }
    public function getRegistrationDate(){
        return $this->registration_date;
    }

    public function setUserID(int $user_id){
        $this->user_id = $user_id;
    }

    public function setFullname(string $fullname){
        $this->fullname = $fullname;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function setPassword(string $password){
        $this->password = $password;
    }

    public function setRole(string $role){
        $this->role = $role;
    }

    public function setRegistrationDate(string $registration_date){
        $this->registration_date = $registration_date;
    }
}
?>