<?php
require __DIR__ . '/../repositories/yummyRepository.php';
require __DIR__ . '/../models/Restaurant.php';
include_once(__DIR__ . '/../models/RestaurantDetails.php');
include_once(__DIR__ . '/../models/Session.php');

class yummyService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new yummyRepository();
    }
    public function getyummy()
    {
        return $this->convertToRestaurantList($this->repository->getyummy());
    }
    private function convertToRestaurant($restaurant)
    {
        return new Restaurant(
            $restaurant['restaurant_id'], 
            $restaurant['name'],
            $restaurant['cuisine']);
    }
    private function convertToRestaurantList($result){
        $restaurantList = [];

        foreach ($result as $restaurant) {
            $restaurantList[] = $this->convertToRestaurant($restaurant);
        }
        return $restaurantList;
    }
    public function getyummyDetail($id)
    {
        $repository = new yummyRepository();
        return $this->convertToRestaurantDetails($repository->getyummyDetail($id));
    }
    private function convertToRestaurantDetails($restaurantDetails)
    {
        return new RestaurantDetails(
            $restaurantDetails['restaurant_id'], 
            $restaurantDetails['name'], 
            $restaurantDetails['description'], 
            $restaurantDetails['price'], 
            $restaurantDetails['price_kids'], 
            $restaurantDetails['star_rating'], 
            $restaurantDetails['cuisine'], 
            $restaurantDetails['website'], 
            $restaurantDetails['phonenumber'], 
            $restaurantDetails['streetname'], 
            $restaurantDetails['postalcode'], 
            $restaurantDetails['city'], 
            $restaurantDetails['housenumber']);
    }
    // public function getSessions($id)
    // {
    //     $repository = new yummyRepository();
    //     return $this->convertToSessionsList($repository->getSessions($id));
    // }
    // private function convertToSession($session)
    // {
        
    //     // return new Session('session_id', 'restaurant_id', 'start_datetime', 'duration', 'seats_left');
    //     // return new Session($session_id, $restaurant_id, $start_datetime, $duration, $seats_left);
    //     return new Session(
    //         $session[0], 
    //         $session[1], 
    //         $session[2], 
    //         $session[3], 
    //         $session[4]);
       
    // }
    // private function convertToSessionsList($sessions){
    //     $sessionsList = [];

    //     foreach ($sessions as $session) {
    //         $sessionsList[] = $this->convertToSession($session);
    //     }
    //     return $sessionsList;
    // }
    public function getAllRestaurants()
    {
        $repository = new yummyRepository();
        return $this->convertToAllRestaurantsList($repository->getAllRestaurants());
    }
    public function convertToAllRestaurantsList($result){
        $restaurantList = [];

        foreach ($result as $restaurant) {
            $restaurantList[] = $this->convertToRestaurantDetails($restaurant);
        }
        return $restaurantList;
    }
    
    public function deleteRestaurantbyId($id)
    {
        $repository = new yummyRepository();
        return $repository->deleteRestaurantbyId($id);
    }
    public function addRestaurant($name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $streetname, $postalcode, $city, $housenumber)
    {
        $repository = new yummyRepository();
        return $repository->addRestaurant($name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $streetname, $postalcode, $city, $housenumber);
    }
    public function updateRestaurant($id, $name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $streetname, $postalcode, $city, $housenumber)
    {
        $repository = new yummyRepository();
        return $repository->updateRestaurant($id, $name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $streetname, $postalcode, $city, $housenumber);
    }
}