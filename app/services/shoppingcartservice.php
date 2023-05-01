<?php
include_once(__DIR__ . '/../repositories/homerepository.php');
include_once (__DIR__ . '/../services/orderservice.php');
include_once (__DIR__ . '/../services/artistservice.php');

class ShoppingcartService{
    
    private $repository;
    private $orderService;
    private $artistService;
    
    function __CONSTRUCT(){
        $this->repository = new HomeRepository();
        $this->orderService = new OrderService();
        $this->artistService = new ArtistService();
    }

    public function getTickets($id){
        // if(isset($_SESSION['ShoppingCart'])){
            $yummyTickets = $this->orderService->getAllTicketByTypeYummy($id);
            $jazzTickets = $this->orderService->getAllTicketByTypeJazz($id);
            // $historyTikets = $this->orderService->getAllTicketByTypeHistory($id);

            var_dump($yummyTickets);
            var_dump($jazzTickets);
            // var_dump($historyTikets);

        //     return $tickets;
        // }else {
        //     //shopping cart does not exist
        // }
    }

    public function addToShoppingcart(){
        $ticket = $this->orderService->getTicketByID(htmlspecialchars(53));
        if($ticket->getEventType() == "jazz"){
            $artist = $this->artistService->getArtistByID($ticket->getEventId());
        }
        $_SESSION['ShoppingCart'][] = serialize($ticket);
    }
    // public function addToShoppingcart(){
    //     $bikeID = htmlspecialchars($_GET['bikeID']);

    //     if($this->checkIfShoppingCardExists()){
    //         $key = $this->checkIfItemExists($bikeID);
    //         if($key === 0 || $key != null){   
    //             $_SESSION['ShoppingCart'][$key]['amount']++; 
    //         }
    //         else{
    //             $count = count($_SESSION['ShoppingCart']);
    //             $_SESSION['ShoppingCart'][$count] = array('bikeID' => $bikeID, "amount" => 1);
    //         }
    //     }
    //     else{
    //         $_SESSION['ShoppingCart'][0] = array('bikeID' => $bikeID, "amount" => 1);
    //     }
    // }

    private function checkIfShoppingCardExists(){
        if(isset($_SESSION['ShoppingCart'])){
            return true;
        }
        return false;
    }
    // private function checkIfItemExists($bikeID){
    //     $item_array_id = array_column($_SESSION['ShoppingCart'], 'bikeID');
    //     if(in_array($bikeID, $item_array_id)){
    //         $key = array_search($bikeID, $item_array_id);
    //         return $key;
    //     }
    //     return null;
    // }
}

?>