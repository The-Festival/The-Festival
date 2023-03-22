<?php

require __DIR__ . '/repository.php';
require __DIR__ . '/../models/artist.php';

class ArtistRepository extends Repository
{
    // Returns an array of Artist objects from the database
    public function getAllArtists()
    {
        $stmt = $this->connection->prepare('SELECT * FROM Artist');
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
