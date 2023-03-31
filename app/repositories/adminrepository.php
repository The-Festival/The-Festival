<?php 
require_once(__DIR__ . '/../models/POI.php');
require_once(__DIR__ . '/../models/IMG.php');
require_once(__DIR__ . '/repository.php');
class AdminRepository extends Repository{
    public function addHistoryEvent($name, $sliderText, $sliderImage, $place, $postalCode, $streetName, $number){
        try {
            $stmt = $this->connection->prepare("INSERT INTO Point_of_interest (name) VALUES (:name);
            INSERT INTO About(`detail_id`,`type`,`about`) VALUES((SELECT MAX(poi_id) FROM Point_of_interest), :name, :sliderText);
            INSERT INTO Foto(`detail_id`,`type`,`filepath`,`isBanner`) VALUES ((SELECT MAX(poi_id) FROM Point_of_interest),:name, :sliderImage, 0 );
            INSERT INTO Location(`detail_id`,`type`,`streetName`,`postalCode`,`city`,`housenumber`) VALUES ((SELECT MAX(poi_id) FROM Point_of_interest), :name, :streetName, :postalCode, :place, :number);
            ");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':sliderText', $sliderText);
            $stmt->bindParam(':sliderImage', $sliderImage);
            $stmt->bindParam(':place', $place);
            $stmt->bindParam(':postalCode', $postalCode);
            $stmt->bindParam(':streetName', $streetName);
            $stmt->bindParam(':number', $number);

            $stmt->execute();
            
        }catch(PDOException $e){
            echo $e;
        }
    }
    public function getHistoryEventIdByName($name){
        try {
            $stmt = $this->connection->prepare("SELECT poi_id AS pointOfInterest, null as about_id, null as photo_id, null as location_id, name, null AS text, null AS location, null AS photo FROM Point_of_interest WHERE name = :name");
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'POI');
            $result = $stmt->fetchAll();
            
            return $result;
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function uploadBanner($id, $bannerImage){
        try {
            $stmt = $this->connection->prepare("INSERT INTO Foto(`detail_id`,`type`,`filepath`,`isBanner`) VALUES (:id, (SELECT name FROM Point_of_interest WHERE poi_id = :id), :bannerImage, 1)");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':bannerImage', $bannerImage);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function editTextAndImage($textID, $imageID, $text, $image){
        try {
            $stmt = $this->connection->prepare("UPDATE About SET about = :text WHERE about_id = :textID;
            UPDATE Foto SET filepath = :image WHERE foto_id = :imageID;");
            $stmt->bindParam(':textID', $textID);
            $stmt->bindParam(':imageID', $imageID);
            $stmt->bindParam(':text', $text);
            $stmt->bindParam(':image', $image);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e;
        }
    }
}

?>