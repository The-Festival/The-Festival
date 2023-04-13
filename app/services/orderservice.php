<?php
include_once (__DIR__ . '/../repositories/orderrepository.php');
use Dompdf\Dompdf;
use Dompdf\Options;

class OrderService{

    private $orderRepository;
    

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
    }

    public function checkRequests(){
        if (isset($_POST['editOrder'])){
            //add data to order through contuctor
            $order = new Order();
            $order->setOrderId($_POST['order_id']);
            $order->setClientName($_POST['client_name']);
            $order->setAddress($_POST['address']);
            $order->setEmailaddress($_POST['email']);
            $order->setPhonenumber($_POST['phone']);
            $order->setTotalPrice($_POST['total_price']);
            $order->setOrderTime($_POST['order_time']);
            $order->setPaymentMethod($_POST['payment_method']);	
            $order->setTotalVat($_POST['total_vat']);
            $this->updateOrder($order);
        }
        if(isset($_POST['createOrder'])){
            $initialTotalPrice = 0;
            $initialTotalVat = 0;
            $order = new Order();
            $order->setClientName($_POST['client_name']);
            $order->setAddress($_POST['address']);
            $order->setEmailaddress($_POST['email']);
            $order->setPhonenumber($_POST['phone']);
            $order->setOrderTime($_POST['order_time']);
            $order->setPaymentMethod($_POST['payment_method']);
            $order->setTotalPrice($initialTotalPrice);
            $order->setTotalVat($initialTotalVat);
            $this->addOrder($order);
        }
        if(isset($_GET['deleteOrder'])){
            $this->deleteOrderPlusAllTicketsOnOrder($_GET['deleteOrder']);
        }
        if (isset($_GET['editOrder'])){
            $order = $this->getOrderById($_GET['editOrder']);
            include __DIR__ . '/../views/admin/order/editOrder.php';
        }

    }
    
    public function checkTicketRequests(){
        if (isset($_GET['ticketsOrder'])){
            $order_id = $_GET['ticketsOrder'];
            $yummyTickets = $this->getAllTicketByTypeYummy($order_id);
            $jazzTickets = $this->getAllTicketByTypeJazz($order_id);
            $historyTickets = $this->getAllTicketByTypeHistory($order_id);
            include __DIR__ . '/../views/admin/order/ticket/tickets.php';
        }
        else if (isset($_GET['deleteTicket']) && isset($_GET['order'])){
            $this->deleteTicket($_GET['deleteTicket']);
            $order_id = $_GET['order'];
            $yummyTickets = $this->getAllTicketByTypeYummy($order_id);
            $jazzTickets = $this->getAllTicketByTypeJazz($order_id);
            $historyTickets = $this->getAllTicketByTypeHistory($order_id);
            include __DIR__ . '/../views/admin/order/ticket/tickets.php';
        }
        else if (isset($_GET['editTicket']) && isset($_GET['order'])){
            $ticket = $this->getTicketById($_GET['editTicket']);
            include __DIR__ . '/../views/admin/order/ticket/editTicket.php';
        }
        else if(isset($_POST['editTicket'])){
            $ticket = new Ticket();
            $ticket->setTicketId($_POST['ticket_id']);
            $ticket->setOrderId($_POST['order_id']);
            $ticket->setEventId($_POST['event_id']);
            $ticket->setEventType($_POST['event_type']);
            $ticket->setVatPercentage($_POST['vat_percentage']);
            $ticket->setQuantity($_POST['quantity']);
            $ticket->setIsChecked($_POST['is_checked']);
            $this->updateTicket($ticket);
            header("Location: /admin/ticketdashboard?ticketsOrder=" . $_POST['order_id']);
        }
        else if(isset($_GET['addYummyTicketToOrder'])){
            $order_id = $_GET['addYummyTicketToOrder'];
            $yummyEvents = $this->getAllYummyEvents();
            include __DIR__ . '/../views/admin/order/ticket/addYummyTicket.php';
        }
        else if(isset($_POST['addYummyTicketToOrder'])){
            $ticket = new Ticket();
            $ticket->setOrderId($_POST['order_id']);
            $ticket->setEventId($_POST['event_id']);
            $ticket->setEventType("yummy");
            $ticket->setVatPercentage($_POST['vat_percentage']);
            $ticket->setQuantity($_POST['quantity']);
            $ticket->setIsChecked($_POST['is_checked']);
            $this->addTicket($ticket);
            header("Location: /admin/ticketdashboard?ticketsOrder=" . $_POST['order_id']);
        }
        else if(isset($_GET['addJazzTicketToOrder'])){
            $order_id = $_GET['addJazzTicketToOrder'];
            $jazzEvents = $this->getAllJazzEvents();
            include __DIR__ . '/../views/admin/order/ticket/addJazzTicket.php';
        }
        else if(isset($_POST['addJazzTicketToOrder'])){
            $ticket = new Ticket();
            $ticket->setOrderId($_POST['order_id']);
            $ticket->setEventId($_POST['event_id']);
            $ticket->setEventType("jazz");
            $ticket->setVatPercentage($_POST['vat_percentage']);
            $ticket->setQuantity($_POST['quantity']);
            $ticket->setIsChecked($_POST['is_checked']);
            $this->addTicket($ticket);
            header("Location: /admin/ticketdashboard?ticketsOrder=" . $_POST['order_id']);
        }
        else if(isset($_GET['addHistoryTicketToOrder'])){
            $order_id = $_GET['addHistoryTicketToOrder'];
            $historyEvents = $this->getAllHistoryEvents();
            include __DIR__ . '/../views/admin/order/ticket/addHistoryTicket.php';
        }
        else if(isset($_POST['addHistoryTicketToOrder'])){
            $ticket = new Ticket();
            $ticket->setOrderId($_POST['order_id']);
            $ticket->setEventId($_POST['event_id']);
            $ticket->setEventType("history");
            $ticket->setVatPercentage($_POST['vat_percentage']);
            $ticket->setQuantity($_POST['quantity']);
            $ticket->setIsChecked($_POST['is_checked']);
            $this->addTicket($ticket);
            header("Location: /admin/ticketdashboard?ticketsOrder=" . $_POST['order_id']);
        }
        else {
            echo "<h1>NO ORDER SELECTED</h1>";
        }
    }

    public function getOrders(){
        return $this->orderRepository->getOrders();
    }

    public function getTickets(){
        return $this->orderRepository->getTickets();
    }

    public function getTicketsByOrderId($order_id){
        return $this->orderRepository->getTicketsByOrderId($order_id);
    }

    public function deleteTicket($ticket_id){
        $this->calculateTotalPriceOfOrderOnTicketDelete($this->getTicketById($ticket_id));
        return $this->orderRepository->deleteTicket($ticket_id);
    }

    public function deleteOrderPlusAllTicketsOnOrder($order_id){
        return $this->orderRepository->deleteOrderPlusAllTicketsOnOrder($order_id);
    }

    public function addOrder($order){
        return $this->orderRepository->addOrder($order);
    }

    public function addTicket($ticket){
        if($this->checkTicketQuantity($ticket)){
            
            $this->orderRepository->addTicket($ticket->getOrderId(), $ticket->getEventType(), $ticket->getEventId(), $ticket->getVatPercentage(), $ticket->getQuantity(), $ticket->getIsChecked());
            $this->calculatePriceAndVatOfTicketOnAdd($ticket);
            return true;
        }
        else {
            return false;
        }
    }

    public function updateOrder($order){
        return $this->orderRepository->updateOrder($order->getOrderId(), $order->getClientName(), $order->getAddress(), $order->getPhonenumber(), $order->getEmailaddress(), $order->getOrderTime(), $order->getPaymentMethod(), $order->getTotalPrice(), $order->getTotalVat());
    }

    public function updateTicket($ticket){
        $this->calculateTotalPriceOfOrderOnTicketEdit($ticket);
        return $this->orderRepository->updateTicket($ticket);
    }

    public function getTicketById($ticket_id){
        return $this->orderRepository->getTicketById($ticket_id);
    }

    public function getOrderById($order_id){
        return $this->orderRepository->getOrderById($order_id);
    }

    public function getAllJazzEvents(){
        return $this->orderRepository->getAllJazzEvents();
    }

    public function getAllHistoryEvents(){
        return $this->orderRepository->getAllHistoryEvents();
    }
    
    public function getAllTicketByTypeYummy($order_id){
        return $this->orderRepository->getAllTicketOnTypeYummy($order_id);
    }

    public function getAllTicketByTypeJazz($order_id){
        return $this->orderRepository->getAllTicketOnTypeJazz($order_id);
    }

    public function getAllTicketByTypeHistory($order_id){
        return $this->orderRepository->getAllTicketOnTypeHistory($order_id);
    }

    public function getAllYummyEvents(){
        return $this->orderRepository->getAllYummyEvents();
    }

    public function checkTicketQuantity($ticket){
        $quantityAndPrice = $this->getQuantityAndPrice($ticket);
        if($quantityAndPrice['seats_left'] < $ticket->getQuantity()){
            return false;
        }
        return true;
    }

    public function calculatePriceAndVatOfTicketOnAdd($ticket){
        $this->calculateAndUpdateTotalPriceOfOrder($this->getOrderById($ticket->getOrderId()));
    }

    public function calculateTotalPriceOfOrderOnTicketDelete($ticket){
        $this->calculateAndUpdateTotalPriceOfOrder($this->getOrderById($ticket->getOrderId()));
    }

    public function calculateTotalPriceOfOrderOnTicketEdit($ticket){
        $this->calculateAndUpdateTotalPriceOfOrder($this->getOrderById($ticket->getOrderId()));
    }

    public function calculateAndUpdateTotalPriceOfOrder($order){
        $tickets = $this->getTicketsByOrderId($order->getOrderId());
        $totalPrice = 0;
        $totalVat = 0;
        foreach($tickets as $ticket){
            $quantityAndPrice = $this->getQuantityAndPrice($ticket);
            $totalPrice += $quantityAndPrice['price'] * $ticket->getQuantity();
            $totalVat += $quantityAndPrice['price'] * $ticket->getQuantity() * $ticket->getVatPercentage() / 100;
        }
        $this->orderRepository->updateOrderPriceAndVat($order->getOrderId(), $totalPrice, $totalVat);
    }

    public function getQuantityAndPrice($ticket){
        switch ($ticket->getEventType()) {
            case "yummy":
                return $quantityAndPrice = $this->orderRepository->getPriceAndQuantityOnYummyEvent($ticket->getEventId());
                break;
            case "jazz":
                return $quantityAndPrice =$this->orderRepository->getPriceAndQuantityOnJazzEvent($ticket->getEventId());
                break;
            case "history":
                return $quantityAndPrice =$this->orderRepository->getPriceAndQuantityOnHistoryEvent($ticket->getEventId());
                break;
            default:
                break;
        }
    }

    //export order data as csv based on column names dynamicly
    public function exportOrderAsCsv($columns){
       $orders = $this->orderRepository->getOrdersByColumn($columns);
        $file = fopen("orderdata_".date('Y-m-d').".csv", "w");

        // Get column headers dynamically from the first order
        $orderKeys = array_keys($orders[0]);
        fputcsv($file, $orderKeys);

        // Write order data
        foreach ($orders as $order) {
            $orderValues = [];
            foreach ($orderKeys as $key) {
                // Only add the value if it hasn't been added already
                if (!in_array($order[$key], $orderValues)) {
                    $orderValues[] = $order[$key];
                }
            }
            fputcsv($file, $orderValues);
        }

        fclose($file);

        // Download the CSV file
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="orderdata.csv";');
        readfile("orderdata_".date('Y-m-d').".csv");   
    }

    public function orderPdf($body , $order_id)
    {
        require '../vendor/autoload.php';
            $order = $this->getOrderById($order_id);
            $dompdf = new Dompdf(["chroot" => __DIR__]);
            
            $html = file_get_contents(__DIR__ . '/../views/admin/order/orderpdf.php');
            $dompdf->loadHtml($body);
            
            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');
            // Render the HTML as PDF
            $dompdf->render();

            $dompdf->addInfo("Title", "Order ".$order->getClientName());

            // Output the generated PDF to Browser
            $dompdf->stream("Order ".$order->getClientName().".pdf");
    }

}