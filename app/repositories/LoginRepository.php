<?php
require __DIR__ . '/repository.php';

class LoginRepository extends Repository {
    public function checkUser($username){
        $stmt = $this->connection->prepare("SELECT * FROM Users WHERE username = :name");
        $stmt->bindParam(':name', $username);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $result = $stmt->fetchAll();
        return $result;
    }
}