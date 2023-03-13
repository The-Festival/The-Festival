<?php

require __DIR__ . '../../services/dashboardservice.php';

class dashboardController
{
    private $dashboardService;

    public function __construct()
    {
        $this->dashboardService = new dashboardService();
    }

    public function index()
    {
        include __DIR__ . '/../views/dashboard.php';
    }
}