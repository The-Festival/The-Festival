<?php

require __DIR__ . '/repository.php';
require __DIR__ . '/../models/POI.php';

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
}

?>