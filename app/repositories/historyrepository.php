<?php

require __DIR__ . '/repository.php';
require __DIR__ . '/../models/POI.php';
require __DIR__ . '/../models/tour.php';

class HistoryRepository extends Repository{
    public function getPointOfInterestData($id){
        try {
            $stmt = $this->connection->prepare("SELECT PO.poi_id AS pointOfInterest, A.about AS text, null AS location, null AS photo FROM `Point_of_interest` AS PO inner join About AS A on A.detail_id=PO.poi_id WHERE PO.poi_id = :id;");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'POI');
            $result = $stmt->fetchAll();
            
            return $result;
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function getTourInfo(){
        try {
            $stmt = $this->connection->prepare("SELECT T.datetime, L.name, L.spaces_left FROM `Tour` AS T INNER JOIN Language AS L ON L.tour_id=T.tour_id ORDER BY T.tour_id;");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Tour');
            $result = $stmt->fetchAll();
            
            return $result;
        }catch(PDOException $e){
            echo $e;
        }
    }
}

?>