<?php

require __DIR__ . '/../repositories/artistrepository.php';
require __DIR__ . '/../models/artist.php';

class ArtistService
{
    private $ArtistRepository;

    public function __construct()
    {
        $this->ArtistRepository = new ArtistRepository();
    }

    // Returns an Artist object with the given id  
    public function getArtistByID($id)
    {
        $result = $this->ArtistRepository->getArtistByID($id);
        return $this->convertToArtist($result);
    }

    // Returns an array of Artist objects
    public function getAllArtists()
    {
        $result = $this->ArtistRepository->getAllArtists();
        return $this->convertToArtistList($result);
    }

    // Converts an array to an Artist object
    private function convertToArtist($result)
    {
        return new Artist($result['artist_id'], $result['name'], $result['about'], $result['price']);
    }

    // Converts an array of artists to an array of Artist objects
    private function convertToArtistList($result)
    {
        $artistList = array();
        foreach ($result as $artist) {
            array_push($artistList, $this->convertToArtist($artist));
        }
        return $artistList;
    }
}
