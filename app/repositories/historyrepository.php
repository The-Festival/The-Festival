<?php

require __DIR__ . '/repository.php';
require __DIR__ . '/../models/POI.php';
require __DIR__ . '/../models/IMG.php';
require __DIR__ . '/../models/tour.php';

class HistoryRepository extends Repository{
    public function getPointOfInterestDataWithoutIMG($id){
        try {
            $stmt = $this->connection->prepare("SELECT PO.poi_id AS pointOfInterest, A.about AS text, null AS location, null AS photo FROM `Point_of_interest` AS PO inner join About AS A on A.poi_id=PO.poi_id WHERE PO.poi_id = :id;");
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
            $stmt = $this->connection->prepare("SELECT `foto_id`,`poi_id`,`filepath`,`isBanner` FROM `Foto` WHERE poi_id = :id AND isBanner = 0;");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'IMG');
            $result = $stmt->fetchAll();
            
            return $result;
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function getTourInfo(){
        try {
            $stmt = $this->connection->prepare("SELECT T.tour_id AS tour_ID, T.datetime, GROUP_CONCAT(DISTINCT L.name SEPARATOR ', ') AS name, GROUP_CONCAT(L.spaces_left SEPARATOR ', ') AS spaces_left FROM `Tour` AS T INNER JOIN Language AS L ON L.tour_id=T.tour_id ORDER BY T.tour_id;");
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
            $stmt = $this->connection->prepare("SELECT `foto_id`,`poi_id`,`filepath`,`isBanner` FROM `Foto` WHERE poi_id = :id AND isBanner = 1;");
            $stmt->bindParam(':id', $id);
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