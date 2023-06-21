<?php

require_once __DIR__ . '/repository.php';

class ArtistRepository extends Repository
{
    /* artist_id, name, about, price, event_id */
    // Returns an Artist object with the given id
    public function getArtistByID($id)
    {
        $stmt = $this->connection->prepare("SELECT artist_id, name, about FROM Artist WHERE artist_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function getArtistEventsByID($id)
    {
        $stmt = $this->connection->prepare("SELECT event_id, artist_id, hall, price, seats, seats_left, datetime FROM Event_Jazz WHERE artist_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // Returns an array of Artist objects
    public function getAllArtists()
    {
        $stmt = $this->connection->prepare("SELECT artist_id, name, about FROM Artist");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // Returns an dictionary of Artist events
    public function getAllArtistsEvents()
    {
        $stmt = $this->connection->prepare("SELECT event_id, artist_id, hall, price, seats, seats_left, datetime FROM Event_Jazz");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
