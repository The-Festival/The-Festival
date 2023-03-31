<?php

require_once __DIR__ . '/repository.php';

class ArtistRepository extends Repository
{
    // Returns an Artist object with the given id
    public function getArtistByID($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM Artist WHERE artist_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    // Returns an array of Artist objects
    public function getAllArtists()
    {
        $stmt = $this->connection->prepare("SELECT * FROM Artist");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
