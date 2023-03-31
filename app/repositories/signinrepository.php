<?php
require_once(__DIR__ . '/repository.php');
require_once(__DIR__ . '/../models/User.php');

class SigninRepository extends Repository {
    public function checkUsernameAndEmail($username, $email){
        try {
            $stmt = $this->connection->prepare("SELECT user_id, fullname, email, '' AS hashedPassword, role, registration_date FROM User WHERE fullname = :name OR email = :email");
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

    public function createAccount($fullname,$email,$hashedPassword, $role, $date){
        try {
            $stmt = $this->connection->prepare("INSERT INTO User(fullname, email, password, role, registration_date) VALUES (:fullname,:email,:hashedPassword, :role, :date)");
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':hashedPassword', $hashedPassword);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':date', $date);
            $stmt->execute();
            return true;

        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }
}
?>