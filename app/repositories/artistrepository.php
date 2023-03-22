<?php

require __DIR__ . '/repository.php';

class ArtistRepository extends Repository{

    public function getAllArtists(){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Artists");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Artist');
            $result = $stmt->fetchAll();
            
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}