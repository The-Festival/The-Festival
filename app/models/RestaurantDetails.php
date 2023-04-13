<?php
class RestaurantDetails{
    public $restaurant_id;
    public $name;
    public $description;
    public $price;
    public $price_kids;
    public $star_rating;
    public $cuisine;
    public $website;
    public $phonenumber;
    public $total_seats;
    public $streetname;
    public $postalcode;
    public $city;
    public $housenumber;

    //bevat join locations zodat het als 1 object kon worden gebruikt
    public function __construct($restaurant_id, $name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats, $streetname, $postalcode, $city, $housenumber){
        $this->restaurant_id = $restaurant_id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->price_kids = $price_kids;
        $this->star_rating = $star_rating;
        $this->cuisine = $cuisine;
        $this->website = $website;
        $this->phonenumber = $phonenumber;
        $this->total_seats = $total_seats;
        $this->streetname = $streetname;
        $this->postalcode = $postalcode;
        $this->city = $city;
        $this->housenumber = $housenumber;
    }

    public function getRestaurant_id(){
        return $this->restaurant_id;
    }
    public function getName(){
        return $this->name;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getPrice_kids(){
        return $this->price_kids;
    }
    public function getStar_rating(){
        return $this->star_rating;
    }
    public function getCuisine(){
        return $this->cuisine;
    }
    public function getWebsite(){
        return $this->website;
    }
    public function getPhonenumber(){
        return $this->phonenumber;
    }
    public function getTotal_seats(){
        return $this->total_seats;
    }
    public function getStreetname(){
        return $this->streetname;
    }
    public function getPostalcode(){
        return $this->postalcode;
    }
    public function getCity(){
        return $this->city;
    }
    public function getHousenumber(){
        return $this->housenumber;
    }
}