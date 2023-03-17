<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/User.php';

class LoginRepository extends BaseRepository {
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
}