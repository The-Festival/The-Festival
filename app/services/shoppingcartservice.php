<?php
include_once(__DIR__ . '/../repository/homerepository.php');
session_start();
class ShoppingcartService{
    
    private $repository;
    
    function __CONSTRUCT(){
        $this->repository = new HomeRepository();
    }

    public function getShoppingCartBikes(){
        if(isset($_SESSION['ShoppingCart'])){
            $item_array_id = array_column($_SESSION['ShoppingCart'], 'bikeID');
            
            $bikes = array();
            for($i = 0; $i < count($item_array_id); $i++){
                $bikes[$i] = $this->repository->getBikeByID($item_array_id[$i]);
            }
            return $bikes;
        }else {
            //shopping cart does not exist
        }
    }
    public function fillShoppingcart(){
        
    }
    public function addToShoppingcart($ticket){
        $_SESSION['ShoppingCart'][] = serialize($ticket);
    }
    public function addToShoppingcart(){
        $bikeID = htmlspecialchars($_GET['bikeID']);

        if($this->checkIfShoppingCardExists()){
            $key = $this->checkIfItemExists($bikeID);
            if($key === 0 || $key != null){   
                $_SESSION['ShoppingCart'][$key]['amount']++; 
            }
            else{
                $count = count($_SESSION['ShoppingCart']);
                $_SESSION['ShoppingCart'][$count] = array('bikeID' => $bikeID, "amount" => 1);
            }
        }
        else{
            $_SESSION['ShoppingCart'][0] = array('bikeID' => $bikeID, "amount" => 1);
        }
    }

    private function checkIfShoppingCardExists(){
        if(isset($_SESSION['ShoppingCart'])){
            return true;
        }
        return false;
    }
    private function checkIfItemExists($bikeID){
        $item_array_id = array_column($_SESSION['ShoppingCart'], 'bikeID');
        if(in_array($bikeID, $item_array_id)){
            $key = array_search($bikeID, $item_array_id);
            return $key;
        }
        return null;
    }
}

?>