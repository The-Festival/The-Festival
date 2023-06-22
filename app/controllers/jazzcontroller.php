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

    public function artist()
    {
        // Check if parameter id is set
        if (!isset($_GET['id']) || !preg_match('/^[0-9]+$/', $_GET['id'])) {
            $this->index();
            return;
        }
        $artist = $this->artistService->getArtistByID($_GET['id']);
        $eventList = $this->artistService->getEventsByArtistID($_GET['id']);
        require __DIR__ . '/../views/jazz/artist.php';
    }

    public function date()
    {
        if (!isset($_GET['date']) || !preg_match('/^(0|20[0-9]{2}-[0-1][0-9]-[0-3][0-9])$/', $_GET['date'])) {
            $this->index();
            return;
        }
        $artistList = $this->artistService->getArtistsByDate($_GET['date']);
        require __DIR__ . '/../views/jazz/index.php';
        echo '<script>window.location.hash = "#artist-cards";</script>';
        return;
    }
}