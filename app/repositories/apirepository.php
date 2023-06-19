<?php
include_once __DIR__ . "/repository.php";
include __DIR__ . '/../models/apitoken.php';
class ApiRepository extends Repository{

    function generateApiToken(){
        $token = bin2hex(random_bytes(32));
        return $token;
    }

    function getAllData(){
        $query = "SELECT `token_id`, `token`, `company_name` FROM `Api_Token` ";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ApiToken');
        $tokens = $stmt->fetchAll();
        return $tokens;
    }

    function addCompany($token, $company_name){
        $query = "INSERT INTO `Api_Token`(`token`, `company_name`) VALUES (:token, :company_name)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':company_name', $company_name);
        $stmt->execute();
    }

    function deleteCompany($token_id){
        $query = "DELETE FROM `Api_Token` WHERE `token_id` = :token_id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':token_id', $token_id);
        $stmt->execute();
    }

    function checkIfTokenExists($token){
        $query = "SELECT `token` FROM `Api_Token` WHERE `token` = :token";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ApiToken');
        $tokens = $stmt->fetchAll();
        if($tokens != null){
            return true;
        }
        else{
            return false;
        }

    }


}
