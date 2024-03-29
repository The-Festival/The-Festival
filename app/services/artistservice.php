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
//safget
    public function getEventById($id){
        $event_result = $this->ArtistRepository->getEventByEventId($id);
        $event = $this->convertToEvent($event_result[0]);
        return $event;
    }

    // Returns an array of Event objects with the given artist id
    public function getEventsByArtistID($id)
    {
        $event_result = $this->ArtistRepository->getArtistEventsByID($id);
        $eventList = array();
        foreach ($event_result as $result) {
            $eventList[] = $this->convertToEvent($result);
        }
        return $eventList;
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
        return new Event($result['event_id'], $result['artist_id'], $result['location'], $result['hall'], $result['price'], $result['seats'], $result['seats_left'], $result['datetime']);
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

    public function getArtistsByDate($date)
    {
        if ($date == "0") {
            return $this->getAllArtists();
        }
        $artist_result = $this->ArtistRepository->getArtistsByDate($date . '%');
        $event_result = $this->ArtistRepository->getArtistsEventsByDate($date . '%');

        // print data for debugging

        return $this->convertToArtistList($artist_result, $event_result);
    }
}