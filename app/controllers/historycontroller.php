<?php

require __DIR__ . '/../services/historyservice.php';

class HistoryController {
    
    private $historyService;

    function __construct(){
        $this->historyService = new HistoryService();
    }

    function index(){
        $POI = $this->historyService->getPointOfInterestData(1);
        $slider = $this->historyService->getPointOfInterestData(2);
        require __DIR__ . '/../views/history/index.php';
    }
}

?>