<?php

require __DIR__ . '/../repositories/artistrepository.php';
require __DIR__ . '/../models/artist.php';
require __DIR__ . '/../models/event.php';

class ArtistService
{
    // Properties
    private $ArtistRepository;

    // Constructor
    public function __construct()
    {
        $this->ArtistRepository = new ArtistRepository();
    }

    // Methods
    // Returns an Artist object with the given id  
    public function getArtistByID($id)
    {
        $artist_result = $this->ArtistRepository->getArtistByID($id);
        $event_result = $this->ArtistRepository->getArtistEventsByID($id);
        $artist = $this->convertToArtist($artist_result);
        foreach ($event_result as $result) {
            $event = $this->convertToEvent($result);
            $artist->addEvent($event);
        }
        return $artist;
    }

    // Returns an array of Artist objects
    public function getAllArtists()
    {
        $artist_result = $this->ArtistRepository->getAllArtists();
        $event_result = $this->ArtistRepository->getAllArtistsEvents();
        return $this->convertToArtistList($artist_result, $event_result);
    }

    // Converts an entry to an Artist object
    private function convertToArtist($result)
    {
        return new Artist($result['artist_id'], $result['name'], $result['about']);
    }

    // Converts an entry to an Event object
    private function convertToEvent($result)
    {
        return new Event($result['event_id'], $result['artist_id'], $result['hall'], $result['price'], $result['seats'], $result['seats_left'], $result['datetime']);
    }

    // Converts an array to an Artist object and adds events to the Artist object
    private function convertToArtistList($artist_result, $event_result)
    {
        $artistList = array();
        foreach ($artist_result as $artist) {
            $artistList[$artist['artist_id']] = $this->convertToArtist($artist);
        }
        foreach ($event_result as $event) {
            $artistList[$event['artist_id']]->addEvent($this->convertToEvent($event));
        }
        return $artistList;
    }
}
