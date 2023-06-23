<?php
include_once(__DIR__ . '/../repositories/homerepository.php');
include_once (__DIR__ . '/../services/orderservice.php');
include_once (__DIR__ . '/../services/artistservice.php');
// include_once (__DIR__ . '/../services/historyservice.php');
include_once (__DIR__ . '/../services/yummyService.php');

class ShoppingcartService{
    
    private $repository;
    private $orderService;
    private $artistService;
    private $yummyService;
    // private $historyService;

    private $name = "";
    private $price = 0;
    private $time = "";
    
    function __CONSTRUCT(){
        $this->repository = new HomeRepository();
        $this->orderService = new OrderService();
        $this->artistService = new ArtistService();
        $this->yummyService = new yummyService();
        // $this->historyService = new HistoryService();
    }

    public function getTickets($id){
        // if(isset($_SESSION['ShoppingCart'])){
            $yummyTickets = $this->orderService->getAllTicketByTypeYummy($id);
            $jazzTickets = $this->orderService->getAllTicketByTypeJazz($id);
            // $historyTikets = $this->orderService->getAllTicketByTypeHistory($id);

            // var_dump($yummyTickets);
            // var_dump($jazzTickets);
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
                $storedItem = $cartItem;
                if(isset($item->tour_ID)){
                    if ($storedItem['event_id'] == $item->getTourID() && $storedItem['event_type'] == "history") {
                        return ['index' => $index, 'item' => $storedItem];
                    }
                }
                else {
                    if ($storedItem['event_id'] == $item->getEventId() && $storedItem['event_type'] == "jazz") {
                        return ['index' => $index, 'item' => $storedItem];
                    }
                }
                // Compare the item in the cart with the new item
                
            }
        }

        return null; // Item not found in the cart
    }

    function addTourToShoppingCart($Tour){
        if (!isset($_SESSION['ShoppingCart'])) {
            $_SESSION['ShoppingCart'] = [];
        }
        $existingItem = $this->findCartItem($Tour[0]);
        if($existingItem !== null){
            $existingIndex = $existingItem['index'];
            $existingObject = $existingItem['item'];

            // Increase the quantity by 1 for the existing item
            $existingObject['quantity']++;

            // Replace the updated item in the cart
            $_SESSION['ShoppingCart'][$existingIndex] = $existingObject;
        }else {
            $this->name = 'History Tour';
            $this->price = $Tour[0]->getPrice();
            $this->time = $Tour[0]->getDateTime();

            $newItem = [
                'event_id' => $Tour[0]->getTourID(),
                'event_type' => "history",
                'product_name' => $this->name, // Replace with the actual name variable
                'product_price' => $this->price, // Replace with the actual price variable
                'quantity' => 1,
                'time' => $this->time
            ];
            
            $_SESSION['ShoppingCart'][] = $newItem;
        }

    }

    function addShoppingCart($id)
    {
        $ticket = $this->orderService->getTicketByID($id);

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
            if($ticket->getEventType() == "Yummy" || $ticket->getEventType() == "yummy"){
                $reservation = $this->yummyService->getReservation($ticket->getEventId());
                $Session = $this->yummyService->getSessions($ticket->getSessionId());
                $Yummy = $this->yummyService->getyummyDetail($Session->getRestaurant_id());
                $this->name = $Yummy->getName();
                $this->price = $Yummy->getPrice();
                $this->time = $Session->getDate() + "Duration: " + $Session->getDuration();
            }
            if($ticket->getEventType() == "Jazz" || $ticket->getEventType() == "Artist" || $ticket->getEventType() == "jazz"){
                $Event = $this->artistService->getEventById($ticket->getEventId());
                $artist = $this->artistService->getArtistByID($Event->getArtistID());
                $this->name = $artist->getName();
                $this->price = $Event->getPrice();
                $this->time = $Event->getTime();
            }
            if($ticket->getEventType() == "History" || $ticket->getEventType() == "history" || $ticket->getEventType() == "History Tour" || $ticket->getEventType() == "history tour"){
                $Tour = $this->historyService->getTourInfoById($ticket->getEventId());
                $this->name = 'History Tour';
                $this->price = $Tour[0]->getPrice();
                $this->time = $Tour[0]->getDateTime();
            }
            // 3. Add the ticket to the shopping cart if it was not already in the shopping cart
    
            $newItem = [
                'event_id' => $ticket->getEventId(),
                'event_type' => $ticket->getEventType(),
                'product_name' => $this->name, // Replace with the actual name variable
                'product_price' => $this->price, // Replace with the actual price variable
                'quantity' => $ticket->getQuantity(),
                'time' => $this->time
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