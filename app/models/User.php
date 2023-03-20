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
}
?>