<?php
require __DIR__ . '/../services/yummyService.php';

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
    public function reloadYummyDetail()
    {
        $restaurant = $this->yummyService->getyummyDetail($this->id);
        //sessions
        $sessionsList = $this->yummyService->getSessions($this->id);
        require __DIR__ . '/../views/yummy/yummyDetail.php';
    }
    public function makeReservation()
    {
        if(isset($_POST['Reservation']))
        {
            if($_SESSION['user'] == null)
            {
                require __DIR__ . '/../views/login/login.php';
                return;
            }
            else{
                $user_id = $_SESSION['user']->getId();
                $nrPeople = htmlspecialchars($_POST['nrPeople']);
                $session_id = htmlspecialchars($_POST['session']);
                $request = htmlspecialchars($_POST['request']);
                $this->yummyService->makeReservation($user_id, $nrPeople, $session_id, $request);
                $this->reloadYummyDetail();
                return;
            }
        }
    }
    public function yummyDashboard(){
        $restaurantList = $this->yummyService->getAllRestaurants();
        require __DIR__ . '/../views/admin/yummyDashboard.php';
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
        require __DIR__ . '/../views/admin/createRestaurant.php';
    }
    public function deleteRestaurant(){
        if (isset($_POST['delete'])){
            $id = htmlspecialchars($_POST['delete']);
            $this->yummyService->deleteRestaurantbyId($id);
            $restaurantList = $this->yummyService->getAllRestaurants();
        }
        require __DIR__ . '/../views/admin/yummyDashboard.php';
    }
    public function editRestaurant(){
        if (isset($_POST['edit'])){
            $id = htmlspecialchars($_POST['edit']);
            $restaurant = $this->yummyService->getyummyDetail($id);
        }
        require __DIR__ . '/../views/admin/editRestaurant.php';
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
        require __DIR__ . '/../views/admin/editRestaurant.php';
    }
}