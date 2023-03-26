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
    
    public function getPageBanner($id){
        return $this->historyRepository->getPageBanner($id);
    }

    public function getPointOfInterestData($id){
        $poiArray = $this->getPointOfInterestDataWithoutIMG($id);
        $imgArray = $this->historyRepository->getPhotosByPOIID($id);
        for($i = 0; $i < count($poiArray); $i++){
            $poiArray[$i]->setPhoto($imgArray[$i]->getFilepath());
        }
        return $poiArray;
    }

    public function getTourInfo(){
        return $this->historyRepository->getTourInfo();
    }

    public function getSliderData(){
        $poiArray = $this->historyRepository->getSliderData();
        $imgArray = $this->historyRepository->getSliderIMG();
        for($i = 0; $i < count($poiArray); $i++){
            $poiArray[$i]->setPhoto($imgArray[$i]->getFilepath());
        }
        return $poiArray;
    }
}

?>