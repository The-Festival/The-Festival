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
        // Check if parameter id is set
        if (isset($_GET['id'])) {
            $this->artist($_GET['id']);
            return;
        }
        $artistList = $this->getAllArtists();
        require __DIR__ . '/../views/jazz/index.php';
    }

    private function getAllArtists()
    {
        return $this->artistService->getAllArtists();
    }

    public function artist($id)
    {
        $id = $_GET['id'];
        $artist = $this->artistService->getArtistByID($id);
        require __DIR__ . '/../views/jazz/artist.php';
    }

    public function date()
    {
        if (!isset($_GET['date'])) {
            $this->index();
        }
        $artistList = $this->artistService->getArtistsByDate($_GET['date']);
        require __DIR__ . '/../views/jazz/index.php';
        echo '<script>window.location.hash = "#artist-cards";</script>';
        return;
    }
}