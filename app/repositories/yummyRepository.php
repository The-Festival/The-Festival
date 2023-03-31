<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/RestaurantDetails.php';

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
            $stmt = $this->connection->prepare("SELECT Restaurant.restaurant_id, Restaurant.name, Restaurant.description, Restaurant.price, Restaurant.price_kids, Restaurant.star_rating, Restaurant.cuisine, Restaurant.website, Restaurant.phonenumber, Location.streetname, Location.postalcode, Location.city, Location.housenumber FROM Restaurant INNER JOIN Location ON Restaurant.restaurant_id=Location.detail_id WHERE restaurant_id = :id");
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
            $stmt = $this->connection->prepare("SELECT session_id, restaurant_id, start_datetime, duration, seats_left FROM Session WHERE Session.restaurant_id = :id");
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();
            $sessions = $stmt->fetch(PDO::FETCH_ASSOC);
            return $sessions;
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

    public function updateRestaurant($restaurant_id, $name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $streetname, $postalcode, $city, $housenumber){
        try {
            $stmt = $this->connection->prepare(
                "UPDATE Restaurant 
                SET restaurant_id = :restaurant_id , 
                `name` = :name ,
                `description`= :description,
                `price`= :price, 
                `price_kids`= :price_kids, 
                `star_rating` = :star_rating,  
                `cuisine` = :cuisine,
                `website` = :website,
                `phonenumber` = :phonenumber
                `streetname` = :streetname,
                `postalcode` = :postalcode,
                `city` = :city,
                `housenumber` = :housenumber
                WHERE `restaurant_id` = :restaurant_id"); 

            $stmt->bindParam(':id', $restaurant_id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':price_kids', $price_kids);
            $stmt->bindParam(':star_rating', $star_rating);
            $stmt->bindParam(':cuisine', $cuisine);
            $stmt->bindParam(':website', $website);
            $stmt->bindParam(':phonenumber', $phonenumber);
            $stmt->bindParam(':streetname', $streetname);
            $stmt->bindParam(':postalcode', $postalcode);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':housenumber', $housenumber);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetchAll();
            
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function addRestaurant($name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $streetname, $postalcode, $city, $housenumber){
        try {
            $stmt = $this->connection->prepare("INSERT INTO `Restaurant` (restaurant_id, `name`, `description`, price, price_kids, star_rating, cuisine, website, phonenumber, streetname, postalcode, city, housenumber) 
            VALUES (NULL, :name, :description, :price, :price_kids, :star_rating, :cuisine, :website, :phonenumber, :streetname, :postalcode, :city, :housenumber)");
           
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':price_kids', $price_kids);
            $stmt->bindParam(':star_rating', $star_rating);
            $stmt->bindParam(':cuisine', $cuisine);
            $stmt->bindParam(':website', $website);
            $stmt->bindParam(':phonenumber', $phonenumber);
            $stmt->bindParam(':streetname', $streetname);
            $stmt->bindParam(':postalcode', $postalcode);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':housenumber', $housenumber);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $result = $stmt->fetchAll();
            
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}