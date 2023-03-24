<?php
require __DIR__ .'/../repositories/historyrepository.php';

class HistoryService{
    private $historyRepository;

    function __CONSTRUCT(){
        $this->historyRepository = new HistoryRepository();
    }   
    public function getPointOfInterestDataWithoutIMG($id){
        return $this->historyRepository->getPointOfInterestDataWithoutIMG($id);
    }

    public function getPointOfInterestData($id){
        $poi = $this->historyRepository->getPointOfInterestDataWithoutIMG($id);
        $img = $this->historyRepository->getPhotosByPOIID($id);
        for($i = 0; $i < count($poi); $i++){
            $poi[$i]->setPhoto($img[$i]->getFilepath());
        }
        return $poi;
    }
    public function getTourInfo(){
        return $this->historyRepository->getTourInfo();
    }
}

?>