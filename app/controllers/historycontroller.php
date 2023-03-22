<?php

require __DIR__ . '/../services/historyservice.php';

class HistoryController {
    
    private $historyService;

    function __construct(){
        $this->historyService = new HistoryService();
    }

    function index(){
        $POI = $this->historyService->getPointOfInterestData(1);
        $tourInfo = $this->historyService->getTourInfo();
        $slider = $this->historyService->getPointOfInterestData(2);
        require __DIR__ . '/../views/history/index.php';
    }

}

?>