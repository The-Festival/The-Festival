<?php

require __DIR__ . '/../repositories/artistrepository.php';

class ArtistService
{
    private $artistRepository;

    public function __construct()
    {
        $this->artistRepository = new ArtistRepository();
    }

    public function getAllArtists()
    {
        $artists = $this->artistRepository->getAllArtists();
        $artistsArray = [];
        foreach ($artists as $artist) {
            $artistsArray[] = new Artist($artist['id'], $artist['name'], $artist['description'], $artist['price']);
        }
        return $artistsArray;
    }
}
