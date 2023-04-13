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
        // var_dump(glob(__DIR__ . '/../public/img/artists/Evolve/*.png'));

        $date1 = "2023-06-27";
        $date2 = "2023-06-28";
        $date3 = "2023-06-29";
        $date4 = "2023-06-30";
        $locations = $this->homeService->getLocations();
        $data = $this->homeService->getAboutText();
        $events1 = $this->homeService->getAllEventStringsOnDate($date1);
        $events2 = $this->homeService->getAllEventStringsOnDate($date2);
        $events3 = $this->homeService->getAllEventStringsOnDate($date3);
        $events4 = $this->homeService->getAllEventStringsOnDate($date4);
        require __DIR__ . '/../views/home/index.php';
    }

    public function about()
    {
        require __DIR__ . '/../views/home/about.php';
    }
}