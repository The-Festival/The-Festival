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
        $locationArray = $this->historyRepository->getLocationByPOIID($id);
        $location = $locationArray[0]->getStreetName() . " " . $locationArray[0]->getHousenumber() . ", " . $locationArray[0]->getPostalCode() . " " . $locationArray[0]->getCity();
        for($i = 0; $i < count($poiArray); $i++){
            $poiArray[$i]->setPhoto($imgArray[$i]->getFilepath());
            $poiArray[$i]->setLocation($location);
            $poiArray[$i]->setlocationID($locationArray[0]->getLocationID());
            $poiArray[$i]->setPhotoID($imgArray[$i]->getFotoID());

        }
        return $poiArray;
    }

    public function getTourInfo(){
        return $this->historyRepository->getTourInfo();
    }

    public function getSliderData(){
        $poiArray = $this->historyRepository->getSliderData();
        $imgArray = $this->historyRepository->getSliderIMG();
        $locationArray = $this->historyRepository->getLocations();
        
        for($i = 0; $i < count($poiArray); $i++){
                foreach($locationArray as $location){
                    if($location->getPOIID() == $poiArray[$i]->getPointOfInterest()){
                        $locationstring = $location->getStreetName() . " " . $location->getHousenumber() . ", " . $location->getPostalCode() . " " . $location->getCity();
                        $poiArray[$i]->setLocation($locationstring); 
                        $poiArray[$i]->setlocationID($location->getLocationID());

                    }
                }
            $poiArray[$i]->setPhoto($imgArray[$i]->getFilepath());
            $poiArray[$i]->setPhotoID($imgArray[$i]->getFotoID());
        }
        return $poiArray;
    }
}

?>