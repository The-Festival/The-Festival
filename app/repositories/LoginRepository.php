<?php
require_once(__DIR__ . '/repository.php');
require_once(__DIR__ . '/../models/User.php');

class LoginRepository extends Repository
{
    public function checkUser($username)
    {
        try {
            $stmt = $this->connection->prepare("SELECT user_id, fullname, email, password, role, registration_date  FROM User WHERE fullname = :name");
            $stmt->bindParam(':name', $username);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetchAll();

            return $result;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
