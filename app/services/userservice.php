<?php
include_once (__DIR__ . '/../repositories/userrepository.php');


class UserService {
    private $userRepository;
    
    public function __construct(){
        $this->userRepository = new UserRepository();
    }


    public function checkUser($username){
        return $this->userRepository->checkUser($username);
    }
    
    public function getAll(){
        return $this->userRepository->getAll();
    }

    public function getUsersOnRole($role){
        return $this->userRepository->getUsersOnRole($role);
    }

    public function getUserById($id){
        return $this->userRepository->getUserById($id);
    }

    public function searchUserByName($name){
        return $this->userRepository->searchUserByName($name);
    }

    public function addUser($fullname, $email, $password, $role , $dateOfRegistration){
        return $this->userRepository->addUser($fullname, $email, $password, $role , $dateOfRegistration);
    }

    public function updateUser($id, $fullname, $email, $role , $dateOfRegistration){
        return $this->userRepository->updateUser($id, $fullname, $email, $role , $dateOfRegistration);
    }

    public function deleteUserbyId($id){
        return $this->userRepository->deleteUserbyId($id);
    }

}