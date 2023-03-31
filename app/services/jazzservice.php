<?php

require __DIR__ . '/../repositories/jazzrepository.php';

class JazzService
{
    private $jazzRepository;

    function __construct()
    {
        $this->jazzRepository = new JazzRepository();
    }
    

    public function getAllArtists(){
        return $this->jazzRepository->getAllArtists();
    }
}