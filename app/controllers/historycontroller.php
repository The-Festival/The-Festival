<?php

require __DIR__ . '/../services/historyservice.php';

class HistoryController {
    
    private $historyService;

    function __construct(){
        $this->historyService = new HistoryService();

    }

    function index(){
        $slider = $this->historyService->getSliderData();
        $tourInfo = $this->historyService->getTourInfo();
        require __DIR__ . '/../views/history/index.php';
    }

    function detailpage(){
        $id = htmlspecialchars($_GET["id"]);
        $banner = $this->historyService->getPageBanner($id);
        $pagePOI = $this->historyService->getPointOfInterestData($id);
        require __DIR__ . '/../views/history/detailpage.php';
    }

    function addTourToCart(){
        $tourId = htmlspecialchars($_GET["id"]);
        $this->historyService->addTourToCart($tourId);
        header("Location: /shoppingcart");

    }

}

?>