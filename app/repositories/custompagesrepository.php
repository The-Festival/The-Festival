<?php
require_once __DIR__ . '/repository.php';
include_once __DIR__ . '/../models/Custompage.php';
class CustompagesRepository extends Repository{

    public function getAll(){
        try{
            $stmt = $this->connection->prepare("SELECT `id`, `name` FROM `Custompage`");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Custompage');
            return $result;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function getById($id){
        try{
            $stmt = $this->connection->prepare("SELECT `id`, `name` FROM `Custompage` WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'CustomPage');
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function add($name){
        try{
            $stmt = $this->connection->prepare("INSERT INTO `Custompage` (`name`) VALUES (:name)");
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function update($id, $name){
        try{
            $stmt = $this->connection->prepare("UPDATE `Custompage` SET `name` = :name WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function delete($id){
        try{
            $stmt = $this->connection->prepare("DELETE FROM `Custompage` WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

}