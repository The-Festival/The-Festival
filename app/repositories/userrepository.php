<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/User.php';

class UserRepository extends BaseRepository {
    public function checkUser($username){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Users WHERE username = :name");
            $stmt->bindParam(':name', $username);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetchAll();
            
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    
    public function getAll(){
        try {
            $stmt = $this->connection->prepare("SELECT `user_id`, `fullname`, `email`, `password`, `role`, `registration_date` FROM `User`");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetchAll();
            
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function getUsersOnRole($role){
        try {
            $stmt = $this->connection->prepare("SELECT `user_id`, `fullname`, `email`, `password`, `role`, `registration_date` FROM `User` WHERE `role` = :role");
            $stmt->bindParam(':role', $role);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetchAll();
            
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function searchUserByName($name){
        try {
            $stmt = $this->connection->prepare("SELECT `user_id`, `fullname`, `email`, `password`, `role`, `registration_date` FROM `User` WHERE `fullname` LIKE :name");
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetchAll();
            
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function getUserById($id){
        try {
            $stmt = $this->connection->prepare("SELECT `user_id`, `fullname`, `email`, `password`, `role`, `registration_date` FROM `User` WHERE `user_id` = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetch();
            
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }



    public function deleteUserbyId($id){

        try {
            $stmt = $this->connection->prepare("DELETE FROM `User` WHERE `user_id` = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetchAll();
            
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
        }

    }

    public function updateUser($id, $fullname, $email,$role , $dateOfRegistration){
        try {
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

        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function addUser($fullname, $email, $password, $role , $dateOfRegistration){
        try {
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

        } catch (PDOException $e)
        {
            echo $e;
        }
    }

}