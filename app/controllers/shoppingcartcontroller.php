<?php
require __DIR__ . '/../services/shoppingcartservice.php';

class ShoppingcartController{
    private $shoppingcartService;

    function __CONSTRUCT(){
        $this->shoppingcartService = new ShoppingcartService();
    }
    public function index(){
        $bikes = $this->shoppingcartService->getShoppingCartBikes();
        require __DIR__ . "/../view/shoppingcart/index.php";
        
    }
    public function add(){
        $this->shoppingcartService->addToShoppingcart();
        $bikes = $this->shoppingcartService->getShoppingCartBikes();
        require __DIR__ . "/../view/shoppingcart/index.php";

    }
}