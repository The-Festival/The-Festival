<?php

require __DIR__ . '../../services/artistsservice.php';

class ArtistsController
{
    private $artistsService;

    public function __construct()
    {
        $this->artistsService = new ArtistsService();
    }

    public function index()
    {
        include __DIR__ . '/../views/jazz/artist.php';
    }
}