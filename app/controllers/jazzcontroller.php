<?php

require __DIR__ . '/../services/jazzservice.php';

class JazzController
{
    private $jazzService;
    public $artistList;

    function __construct()
    {
        $this->jazzService = new JazzService();
    }

    public function index()
    {
        require __DIR__ . '/../views/jazz/index.php';
    }

    private function getAllArtists()
    {
        $artistlist = $this->jazzService->getAllArtists();
    }
}
