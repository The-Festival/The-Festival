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
    //Restaurant en restaurantdetails zijn 2 verschillende classes
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
            $restaurantDetails['total_seats'],
            $restaurantDetails['streetname'], 
            $restaurantDetails['postalcode'], 
            $restaurantDetails['city'], 
            $restaurantDetails['housenumber']);
    }
    public function getSessions($id)
    {
        return $this->repository->getSessions($id);
    }
    public function getAllRestaurants()
    {
        return $this->convertToAllRestaurantsList($this->repository->getAllRestaurants());
    }
    public function convertToAllRestaurantsList($result){
        $restaurantList = [];

        foreach ($result as $restaurant) {
            $restaurantList[] = $this->convertToRestaurantDetails($restaurant);
        }
        return $restaurantList;
    }
    public function getReservation($id){
        return $this->repository->getReservation($id);
    }
    //Reservation
    // public function makeReservation($user_id, $nrPeople, $session_id, $request){
    //     $reservationFee = 10;
    //     return $this->repository->makeReservation($user_id, $nrPeople, $session_id, $request, $reservationFee);
    // }

    //CRUD
    public function deleteRestaurantbyId($id)
    {
        return $this->repository->deleteRestaurantbyId($id);
    }
    public function addRestaurant($name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats, $streetname, $postalcode, $city, $housenumber)
    {
        return $this->repository->addRestaurant($name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats, $streetname, $postalcode, $city, $housenumber);
    }
    public function updateRestaurant($id, $name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats, $streetname, $postalcode, $city, $housenumber)
    {
        return $this->repository->updateRestaurant($id, $name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats, $streetname, $postalcode, $city, $housenumber);
    }
}