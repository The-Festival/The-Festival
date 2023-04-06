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
        if (!isset($_GET['artist_id'])) {
            $this->redirect('/jazz');
        }

        $id = htmlspecialchars($_GET['artist_id']);

        if (!is_numeric($id)) {
            $this->redirect('/jazz');
        }

        $artist = $this->artistService->getArtistByID($id);

        if (!isset($artist)) {
            $this->redirect('/jazz');
        }

        require __DIR__ . '/../views/jazz/artist.php';
    }

    private function redirect($url)
    {
        header('Location: ' . $url);
        exit();
    }
}
