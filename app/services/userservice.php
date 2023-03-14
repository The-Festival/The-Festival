<?php
require __DIR__ . '/../repositories/userrepository.php';


class UserService {
    public function checkUser($username){
        $repository = new UserRepository();
        return $repository->checkUser($username);
    }
    
    public function getAll(){
        $repository = new UserRepository();
        return $repository->getAll();
    }

    public function getUsersOnRole($role){
        $repository = new UserRepository();
        return $repository->getUsersOnRole($role);
    }

    public function getUserById($id){
        $repository = new UserRepository();
        return $repository->getUserById($id);
    }

    public function searchUserByName($name){
        $repository = new UserRepository();
        return $repository->searchUserByName($name);
    }

    public function addUser($fullname, $email, $password, $role , $dateOfRegistration){
        $repository = new UserRepository();
        return $repository->addUser($fullname, $email, $password, $role , $dateOfRegistration);
    }

    public function updateUser($id, $fullname, $email, $role , $dateOfRegistration){
        $repository = new UserRepository();
        return $repository->updateUser($id, $fullname, $email, $role , $dateOfRegistration);
    }

    public function deleteUserbyId($id){
        $repository = new UserRepository();
        return $repository->deleteUserbyId($id);
    }

}