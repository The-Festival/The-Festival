<?php

require __DIR__ . '/../services/jazzservice.php';

class JazzController
{
    private $jazzService;

    function __construct()
    {
        $this->jazzService = new JazzService();
    }

    public function index()
    {
        require __DIR__ . '/../views/jazz/index.php';
    }
}