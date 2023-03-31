<?php
require_once(__DIR__ . '/repository.php');
require_once(__DIR__ . '/../models/location.php');
class HomeRepository extends Repository
{

    public function getAboutText()
    {
        try{
            $stmt = $this->connection->prepare("SELECT about FROM About WHERE detail_id = 1 AND type = 'main'");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $result;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function updateAboutText($aboutText)
    {
        try{
            $stmt = $this->connection->prepare("UPDATE About SET about = :about WHERE detail_id = 1 AND type = 'main'");
            $stmt->bindParam(':about', $aboutText);
            $stmt->execute();
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function getJazzEventsDaily($date)
    {
        try{
            $stmt = $this->connection->prepare("SELECT MIN(datetime) AS first_session, MAX(datetime) AS last_session,
            (SELECT hall FROM Event_Jazz WHERE datetime = MIN(e.datetime)) AS first_session_hall,
            (SELECT hall FROM Event_Jazz WHERE datetime = MAX(e.datetime)) AS last_session_hall
            FROM Event_Jazz e
            WHERE DATE(datetime) = :date;
        ");
            $stmt->bindParam(':date', $date);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function getToursOnDate($date)
    {
        try{
            $stmt = $this->connection->prepare("SELECT tour_id, datetime AS start_time, start_location FROM Tour WHERE DATE(datetime) = :date  ORDER BY start_time ASC;");
            $stmt->bindParam(':date', $date);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $result;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }
    
    public function getLocations(){
        try{
            $stmt = $this->connection->prepare("SELECT `location_id`, `detail_id`, `type`, `streetname`, `postalcode`, `city`, `housenumber` FROM `Location`;");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Location');

            return $result;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    function insertImg($detail_id, $type, $source,$isBanner) {
        try{
            $stmt = $this->connection->prepare("INSERT INTO `Foto` (`detail_id`, `type`, `filepath`, `isBanner`) VALUES (:detail_id, :type, :source, :isBanner);");
            $stmt->bindParam(':detail_id', $detail_id);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':source', $source);
            $stmt->bindParam(':isBanner', $isBanner);
            $stmt->execute();
        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}
?>