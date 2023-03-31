<?php
require __DIR__ . '/../services/yummyService.php';

class YummyController
{
    private $yummyService;

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
            $id = htmlspecialchars($_POST['detail-page']);
            $restaurant = $this->yummyService->getyummyDetail($id);
            // $sessionsList = $this->yummyService->getSessions($id);
        }
        require __DIR__ . '/../views/yummy/yummyDetail.php';
    }
    // public function getSession(){
    //     if (isset($_POST['detail-page'])){
    //         $id = htmlspecialchars($_POST['detail-page']);
    //         $sessionsList = $this->yummyService->getSessions($id);
    //     }
    //     require __DIR__ . '/../views/yummy/yummyDetail.php';
    // }


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
            $streetname = htmlspecialchars($_POST['streetname']);
            $postalcode = htmlspecialchars($_POST['postalcode']);
            $city = htmlspecialchars($_POST['city']);
            $housenumber = htmlspecialchars($_POST['housenumber']);
            $this->yummyService->addRestaurant($name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $streetname, $postalcode, $city, $housenumber);
            $restaurantList = $this->yummyService->getAllRestaurants();
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
            $streetname = htmlspecialchars($_POST['streetname']);
            $postalcode = htmlspecialchars($_POST['postalcode']);
            $city = htmlspecialchars($_POST['city']);
            $housenumber = htmlspecialchars($_POST['housenumber']);
            $restaurant = $this->yummyService->updateRestaurant($id, $name, $description, $price, $price_kids, $star_rating, $cuisine, $website, $phonenumber, $streetname, $postalcode, $city, $housenumber);
        }
        require __DIR__ . '/../views/admin/editRestaurant.php';
    }
}