<?php

require __DIR__ . '/../services/artistservice.php';

class JazzController
{
    private $artistService;

    function __construct()
    {
        $this->artistService = new ArtistService();
    }

    public function index()
    {
        $artistList = $this->getAllArtists();
        require __DIR__ . '/../views/jazz/index.php';
    }

    private function getAllArtists()
    {
        return $this->artistService->getAllArtists();
    }
}
