<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/RestaurantDetails.php';
require __DIR__ . '/../models/Session.php';

class yummyRepository extends repository{
    private $db;

    public function getyummy(){
        $stmt = $this->connection->prepare("SELECT restaurant_id, name, cuisine FROM Restaurant;");
        $stmt->execute();
        $restaurants = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $restaurants;
    }
    public function getyummyDetail($id){
        try{
            $stmt = $this->connection->prepare("SELECT Restaurant.restaurant_id, Restaurant.name, Restaurant.description, Restaurant.price, Restaurant.price_kids, Restaurant.star_rating, Restaurant.cuisine, Restaurant.website, Restaurant.phonenumber, Restaurant.total_seats, Location.streetname, Location.postalcode, Location.city, Location.housenumber FROM Restaurant INNER JOIN Location ON Restaurant.restaurant_id=Location.detail_id WHERE restaurant_id = :id");
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();
            $restaurant = $stmt->fetch(PDO::FETCH_ASSOC);
            return $restaurant;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        
    }
    public function getSessions($id){
        try{
            $stmt = $this->connection->prepare("SELECT session_id, restaurant_id, start_datetime as date, duration, seats_left FROM Session WHERE Session.restaurant_id = :id");
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Session');
            $result = $stmt->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function makeReservation($user_id, $nrPeople, $session_id, $request, $reservationFee){
        try{
            var_dump($user_id, $nrPeople, $session_id, $request, $reservationFee);
            $stmt = $this->connection->prepare(
            "INSERT INTO Reservation (session_id, user_id, request, count_people, reservation_fee) 
            VALUES (:session_id, :user_id, :request, :nrPeople, :reservationFee)");
            $stmt->bindParam(':session_id', $session_id);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':request', $request);
            $stmt->bindParam(':nrPeople', $nrPeople);
            $stmt->bindParam(':reservationFee', $reservationFee);
            
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Reservation');
            $result = $stmt->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
    //admin
    public function getAllRestaurants(){
        $stmt = $this->connection->prepare("SELECT 
            Restaurant.restaurant_id, 
            Restaurant.name, 
            Restaurant.description, 
            Restaurant.price, 
            Restaurant.price_kids, 
            Restaurant.star_rating, 
            Restaurant.cuisine, 
            Restaurant.website, 
            Restaurant.phonenumber, 
            Restaurant.total_seats,
            Location.streetname, 
            Location.postalcode, 
            Location.city, 
            Location.housenumber 
            FROM Restaurant 
            INNER JOIN Location ON Restaurant.restaurant_id=Location.detail_id");

        $stmt->execute();
        $restaurants = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $restaurants;
    }
    public function deleteRestaurantbyId($id){

        try {
            $stmt = $this->connection->prepare("DELETE FROM Restaurant WHERE restaurant_id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'RestaurantDetails');
            $result = $stmt->fetchAll();
            
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function updateRestaurant($restaurant_id, $name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats, $streetname, $postalcode, $city, $housenumber){
        try {
            $stmt = $this->connection->prepare(
                "UPDATE Restaurant 
                SET 
                `name` = :name ,
                `description`= :description,
                `price`= :price, 
                `price_kids`= :price_kids, 
                `star_rating` = :star_rating,  
                `cuisine` = :cuisine,
                `website` = :website,
                `phonenumber` = :phonenumber,
                `total_seats` = :total_seats,
                WHERE `restaurant_id` = :restaurant_id;
                UPDATE `Location`
                SET
                `streetname` = :streetname,
                `postalcode` = :postalcode,
                `city` = :city,
                `housenumber` = :housenumber
                WHERE `detail_id` = :restaurant_id;"); 

            $stmt->bindParam(':id', $restaurant_id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':price_kids', $price_kids);
            $stmt->bindParam(':star_rating', $star_rating);
            $stmt->bindParam(':cuisine', $cuisine);
            $stmt->bindParam(':website', $website);
            $stmt->bindParam(':phonenumber', $phonenumber);
            $stmt->bindParam(':total_seats', $total_seats);

            $stmt->bindParam(':streetname', $streetname);
            $stmt->bindParam(':postalcode', $postalcode);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':housenumber', $housenumber);

            $stmt->execute();

        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function addRestaurant($name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats, $streetname, $postalcode, $city, $housenumber){
        try {
            $stmt = $this->connection->prepare(
            "INSERT INTO `Restaurant` (`name`, `description`, price, price_kids, star_rating, cuisine, website, phonenumber, total_seats) 
            VALUES (:name, :description, :price, :price_kids, :star_rating, :cuisine, :website, :phonenumber, :total_seats);
            INSERT INTO `Location` (detail_id, `type`, streetname, postalcode, city, housenumber) 
            VALUES ((SELECT restaurant_id FROM Restaurant WHERE `name` = :name), 'Restaurant', :streetname, :postalcode, :city, :housenumber);"
        );
           
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':price_kids', $price_kids);
            $stmt->bindParam(':star_rating', $star_rating);
            $stmt->bindParam(':cuisine', $cuisine);
            $stmt->bindParam(':website', $website);
            $stmt->bindParam(':phonenumber', $phonenumber);
            $stmt->bindParam(':total_seats', $total_seats);

            $stmt->bindParam(':streetname', $streetname);
            $stmt->bindParam(':postalcode', $postalcode);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':housenumber', $housenumber);
            $stmt->execute();

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}