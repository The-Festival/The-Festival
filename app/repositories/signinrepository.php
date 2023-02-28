<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/User.php';

class SigninRepository extends Repository {
    public function checkUsernameAndEmail($username, $email){
        try {
            $stmt = $this->connection->prepare("SELECT userID, username, '' AS hashedPassword, email FROM Users WHERE username = :name OR email = :email");
            $stmt->bindParam(':name', $username);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetchAll();
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }

    public function createAccount($username,$email,$hashedPassword){
        try {
            $stmt = $this->connection->prepare("INSERT INTO Users(username, hashedPassword, email) VALUES (:name,:hashedPassword,:email)");
            $stmt->bindParam(':name', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':hashedPassword', $hashedPassword);
            $stmt->execute();
            return true;

        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }
}