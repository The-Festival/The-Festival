<?php
require __DIR__ .'/../repositories/historyrepository.php';

class HistoryService{
    private $historyRepository;

    function __CONSTRUCT(){
        $this->historyRepository = new HistoryRepository();
    }
    public function getPointOfInterestData($id){
        return $this->historyRepository->getPointOfInterestData($id);
    }
    public function getTourInfo(){
        return $this->historyRepository->getTourInfo();
    }
}

?>