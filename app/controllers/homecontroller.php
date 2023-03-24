<?php
require_once(__DIR__ . '/../services/homeservice.php');
class HomeController
{   
    private $homeService;

    public function __construct()
    {
        $this->homeService = new HomeService();
    }
    public function index()
    {   
        $date = "2023-04-01";//date('Y-m-d');
        $jazzEvent = $this->homeService->getJazzEventsDaily($date);
        $jazzEventString = $this->homeService->getJazzEventString($jazzEvent);
        $data = $this->homeService->getAboutText();
        $dateTour = "2023-05-01";//date('Y-m-d');
        $tours = $this->homeService->getToursOnDate($dateTour);
        $tourString = $this->homeService->getTourString($tours);
        $locations = $this->homeService->getLocations();
        require __DIR__ . '/../views/home/index.php';
    }

    public function about()
    {
        require __DIR__ . '/../views/home/about.php';
    }
}