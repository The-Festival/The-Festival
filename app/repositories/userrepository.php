<?php

include_once( __DIR__ . '/repository.php');
include_once(__DIR__ . '/../models/User.php');


class UserRepository extends Repository {
    public function checkUser($username){
            $stmt = $this->connection->prepare("SELECT * FROM Users WHERE username = :name");
            $stmt->bindParam(':name', $username);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetchAll();
            
            return $result;

    }
    
    public function getAll(){
            $stmt = $this->connection->prepare("SELECT `user_id`, `fullname`, `email`, `password`, `role`, `registration_date` FROM `User`");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetchAll();
            
            return $result;
    }

    public function getUsersOnRole($role){

            $stmt = $this->connection->prepare("SELECT `user_id`, `fullname`, `email`, `password`, `role`, `registration_date` FROM `User` WHERE `role` = :role");
            $stmt->bindParam(':role', $role);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetchAll();
            return $result;

    }

    public function searchUserByName($name){
            $stmt = $this->connection->prepare("SELECT `user_id`, `fullname`, `email`, `password`, `role`, `registration_date` FROM `User` WHERE `fullname` LIKE :name");
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetchAll();            
            return $result;

    }

    public function getUserById($id){
            $stmt = $this->connection->prepare("SELECT `user_id`, `fullname`, `email`, `password`, `role`, `registration_date` FROM `User` WHERE `user_id` = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetch();
            return $result;

      
    }



    public function deleteUserbyId($id){
            $stmt = $this->connection->prepare("DELETE FROM `User` WHERE `user_id` = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetchAll();
            
            return $result;

    }

    public function updateUser($id, $fullname, $email,$role , $dateOfRegistration){
            $stmt = $this->connection->prepare("UPDATE `User` SET `fullname` = :fullname , `email` = :email ,`role`= :role ,`registration_date`= :regdate WHERE `user_id` = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':regdate', $dateOfRegistration);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetchAll();
            
            return $result;

    }

    public function addUser($fullname, $email, $password, $role , $dateOfRegistration){
            $stmt = $this->connection->prepare("INSERT INTO `User` (`user_id`, `fullname`, `email`, `password`, `role`, `registration_date`) VALUES (NULL, :fullname, :email, :password, :role, :regdate)");
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':regdate', $dateOfRegistration);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetchAll();
            
            return $result;
    }

}