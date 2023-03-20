<?php

require __DIR__ . '/../services/artistservice.php';

class JazzController
{
    private $artistService;
    public $artistList;

    function __construct()
    {
        $this->artistService = new ArtistService();
    }

    public function index()
    {
        $this->getAllArtists();
        require __DIR__ . '/../views/jazz/index.php';
    }

    private function getAllArtists()
    {
        $artistlist = $this->artistService->getAllArtists();
    }
}
