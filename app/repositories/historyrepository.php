<?php

require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/POI.php';
require_once __DIR__ . '/../models/IMG.php';
require_once __DIR__ . '/../models/tour.php';
require_once __DIR__ . '/../models/location.php';

class HistoryRepository extends Repository{
    public function getPointOfInterestDataWithoutIMG($id){
        try {
            $stmt = $this->connection->prepare("SELECT PO.poi_id AS pointOfInterest, A.about_id, null as photo_id, null as location_id, PO.name, A.about AS text, null AS location, null AS photo FROM `Point_of_interest` AS PO inner join About AS A on A.detail_id=PO.poi_id WHERE PO.poi_id = :id LIMIT 10 OFFSET 1;");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'POI');
            $result = $stmt->fetchAll();
            
            return $result;
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function getPhotosByPOIID($id){
        try {
            $stmt = $this->connection->prepare("SELECT `foto_id`,`detail_id`,`filepath`,`isBanner` FROM `Foto` WHERE detail_id = :id AND isBanner = 0;");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'IMG');
            $result = $stmt->fetchAll();
            
            return $result;
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function getLocationByPOIID($id){
        try {
            $stmt = $this->connection->prepare("SELECT `location_id`, `detail_id`, `type`, `streetname`, `postalcode`, `city`, `housenumber` FROM `Location` WHERE `detail_id` = :id;");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Location');
            $result = $stmt->fetchAll();
            
            return $result;
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function getLocations(){
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT `location_id`, `detail_id`, `type`, `streetname`, `postalcode`, `city`, `housenumber` FROM `Location`;");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Location');
            $result = $stmt->fetchAll();
            
            return $result;
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function getTourInfo(){
        try {
            $stmt = $this->connection->prepare("SELECT T.tour_id AS tour_ID, T.datetime, GROUP_CONCAT(DISTINCT L.name SEPARATOR ', ') AS name, GROUP_CONCAT(L.available_spaces SEPARATOR ', ') AS spaces_left, G.name as guide FROM `Tour` AS T INNER JOIN Language AS L ON L.tour_id=T.tour_id INNER JOIN Guide AS G on G.tour_id=T.tour_id ORDER BY T.tour_id;");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Tour');
            $result = $stmt->fetchAll();
            
            return $result;
        }catch(PDOException $e){
            echo $e;
        }
    }
    public function getPageBanner($id){
        try {
            $stmt = $this->connection->prepare("SELECT `foto_id`,`detail_id`,`filepath`,`isBanner` FROM `Foto` WHERE detail_id = :id AND isBanner = 1;");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'IMG');
            $result = $stmt->fetchAll();
            
            return $result;
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function getSliderData(){
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT PO.poi_id AS pointOfInterest, PO.name, A.about AS text, null AS location, null AS photo FROM `Point_of_interest` AS PO inner join About AS A on A.detail_id=PO.poi_id GROUP BY PO.poi_id;");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'POI');
            $result = $stmt->fetchAll();
            
            return $result;
        }catch(PDOException $e){
            echo $e;
        }
    }
    public function getSliderIMG(){
        try {
            $stmt = $this->connection->prepare("SELECT DISTINCT `foto_id`,`detail_id`,`filepath`,`isBanner` FROM `Foto` GROUP BY detail_id;");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'IMG');
            $result = $stmt->fetchAll();
            
            return $result;
        }catch(PDOException $e){
            echo $e;
        }
    }
}

?>
