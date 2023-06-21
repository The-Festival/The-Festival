<?php
include_once(__DIR__ . '/../repositories/homerepository.php');
include_once (__DIR__ . '/../services/orderservice.php');
include_once (__DIR__ . '/../services/artistservice.php');
include_once (__DIR__ . '/../services/hisoryservice.php');

class ShoppingcartService{
    
    private $repository;
    private $orderService;
    private $artistService;
    private $yummyService;
    private $historyService;
    
    function __CONSTRUCT(){
        $this->repository = new HomeRepository();
        $this->orderService = new OrderService();
        $this->artistService = new ArtistService();
        $this->yummyService = new yummyService();
        $this->historyService = new HistoryService();
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

    // public function checkIfCartEmpty(){
    //     if(!isset($_SESSION['ShoppingCart'])){
    //         $_SESSION['ShoppingCart'] = array();
    //     }
    // }

    // public function checkIfItemInCart($item_array){
    //     if(!empty($_SESSION['ShoppingCart'])){
    //         foreach($_SESSION['ShoppingCart'] as $item){
                
    //             if($item['event_id'] == $item_array['event_id'] && $value['event_type'] == $item_array['event_type']){
    //                 return $key;
    //             }
    //         }
    //     }
    //     return null;
    // }

    function findCartItem($item)
    {
        if (isset($_SESSION['ShoppingCart'])) {
            foreach ($_SESSION['ShoppingCart'] as $index => $cartItem) {
                $storedItem = unserialize($cartItem);

                // Compare the item in the cart with the new item
                if ($storedItem->getTicketId() == $item->getTicketId()) {
                    return ['index' => $index, 'item' => $storedItem];
                }
            }
        }

        return null; // Item not found in the cart
    }

    function addShoppingCart()
    {
        $ticket = $this->orderService->getTicketByID(htmlspecialchars(56));

        // 1. Check if the session shopping cart exists, if not, create a new session
        if (!isset($_SESSION['ShoppingCart'])) {
            $_SESSION['ShoppingCart'] = [];
        }

        // 2. Check if the item is already in the shopping cart and increase the quantity if found
        $existingItem = $this->findCartItem($ticket);

        if ($existingItem !== null) {
            $existingIndex = $existingItem['index'];
            $existingObject = $existingItem['item'];

            // Increase the quantity by 1 for the existing item
            $existingObject['quantity']++;

            // Replace the updated item in the cart
            $_SESSION['ShoppingCart'][$existingIndex] = $existingObject;
        } else {
            $name = "";
            $price = 0;
            $time = "";
            if($ticket->getEventType() == "Yummy"){
                $reservation = $this->yummyService->getReservation($ticket->getEventId());
                $Session = $this->yummyService->getSessions($ticket->getSessionId());
                $Yummy = $this->yummyService->getyummyDetail($Session->getRestaurant_id());
                $name = $Yummy->getName();
                $price = $Yummy->getPrice();
                $time = $Session->getDate() + "Duration: " + $Session->getDuration();
            }
            if($ticket->getEventType() == "Jazz"){
                $Event = $this->artistService->getEventById($ticket->getEventId());
                $artist = $this->artistService->getArtistByID($Event->getArtistID());
                $name = $artist->getName();
                $price = $Event->getPrice();
                $time = $Event->getTime();
            }
            if($ticket->getEventType() == "History"){
                $Tour = $this->historyService->getTourInfoById($ticket->getEventId());
                $name = $Tour->getName();
                $price = $Tour->getPrice();
                $time = $Tour->getDateTime();
            }
            // 3. Add the ticket to the shopping cart if it was not already in the shopping cart
            $newItem = [
                'event_id' => $ticket->getEventId(),
                'event_type' => $ticket->getEventType(),
                'product_name' => $name, // Replace with the actual name variable
                'product_price' => $price, // Replace with the actual price variable
                'quantity' => $ticket->getQuantity(),
                'time' => $time
            ];
            
            $_SESSION['ShoppingCart'][] = $newItem;
        }
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