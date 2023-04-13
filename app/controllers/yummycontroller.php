<?php
require __DIR__ . '/../services/yummyService.php';
include_once(__DIR__ . '/../models/ReservationItem.php');

class YummyController
{
    private $yummyService;
    private $id;

    public function __construct()
    {
        $this->yummyService = new yummyService();
    }
    public function yummy()
    {
        $restaurantList = $this->yummyService->getyummy();
        require __DIR__ . '/../views/yummy/yummy.php';
    }
    public function yummyDetail()
    {
        if (isset($_POST['detail-page'])){
            $this->id = htmlspecialchars($_POST['detail-page']);
            $restaurant = $this->yummyService->getyummyDetail($this->id);
            //sessions
            $sessionsList = $this->yummyService->getSessions($this->id);  
        }
        require __DIR__ . '/../views/yummy/yummyDetail.php';
    }

    public function makeReservation()
    {
        if(isset($_POST['Reservation']))
        {
            $count_people = htmlspecialchars($_POST['nrPeople']);
            $session_id = htmlspecialchars($_POST['session']);
            $request = htmlspecialchars($_POST['requests']);
            $reservation_fee = htmlspecialchars(10);
            
            $_SESSION['reservation'] = new ReservationItem($session_id, $request, $count_people, $reservation_fee);
            $this->yummy();
        }
    }
    public function yummyDashboard(){
        $restaurantList = $this->yummyService->getAllRestaurants();
        require __DIR__ . '/../views/admin/yummy/yummyDashboard.php';
    }
    
    public function addRestaurant(){
        if (isset($_POST['add'])){
            $name = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']);
            $price = htmlspecialchars($_POST['price']);
            $price_kids = htmlspecialchars($_POST['price_kids']);
            $star_rating = htmlspecialchars($_POST['star_rating']);
            $cuisine = htmlspecialchars($_POST['cuisine']);
            $website = htmlspecialchars($_POST['website']);
            $phonenumber = htmlspecialchars($_POST['phonenumber']);
            $total_seats = htmlspecialchars($_POST['total_seats']);
            $streetname = htmlspecialchars($_POST['streetname']);
            $postalcode = htmlspecialchars($_POST['postalcode']);
            $city = htmlspecialchars($_POST['city']);
            $housenumber = htmlspecialchars($_POST['housenumber']);
            $this->yummyService->addRestaurant($name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats, $streetname, $postalcode, $city, $housenumber);
            $this->yummyDashboard();
            return;
        }
        require __DIR__ . '/../views/admin/yummy/createRestaurant.php';
    }
    public function deleteRestaurant(){
        if (isset($_POST['delete'])){
            $id = htmlspecialchars($_POST['delete']);
            $this->yummyService->deleteRestaurantbyId($id);
            $restaurantList = $this->yummyService->getAllRestaurants();
        }
        require __DIR__ . '/../views/admin/yummy/yummyDashboard.php';
    }
    public function editRestaurant(){
        if (isset($_POST['edit'])){
            $id = htmlspecialchars($_POST['edit']);
            $restaurant = $this->yummyService->getyummyDetail($id);
        }
        require __DIR__ . '/../views/admin/yummy/editRestaurant.php';
    }
    public function updateRestaurant(){
        if (isset($_POST['update'])){
            $id = htmlspecialchars($_POST['id']);
            $name = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']);
            $price = htmlspecialchars($_POST['price']);
            $price_kids = htmlspecialchars($_POST['price_kids']);
            $star_rating = htmlspecialchars($_POST['star_rating']);
            $cuisine = htmlspecialchars($_POST['cuisine']);
            $website = htmlspecialchars($_POST['website']);
            $phonenumber = htmlspecialchars($_POST['phonenumber']);
            $total_seats = htmlspecialchars($_POST['total_seats']);
            $streetname = htmlspecialchars($_POST['streetname']);
            $postalcode = htmlspecialchars($_POST['postalcode']);
            $city = htmlspecialchars($_POST['city']);
            $housenumber = htmlspecialchars($_POST['housenumber']);

            $restaurant = $this->yummyService->updateRestaurant($id, $name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $total_seats, $streetname, $postalcode, $city, $housenumber);
            $this->yummyDashboard();
            return;
        }
        require __DIR__ . '/../views/admin/yummy/editRestaurant.php';
    }
    public function sessionDashboard(){
        // $sessionsList = $this->yummyService->getAllSessions();
        require __DIR__ . '/../views/admin/yummy/sessionDashboard.php';
    }
}