<?php
include_once (__DIR__ . '/../repositories/orderrepository.php');
require '../vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

class OrderService{

    private $orderRepository;
    

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
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
        $order_id = $this->getTicketById($ticket_id)->getOrderId();
        $this->orderRepository->deleteTicket($ticket_id);
        $this->updatePriceOfOrderWithOrderId($order_id);
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
            $this->updatePricesOfOrder($ticket);
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
        $this->orderRepository->updateTicket($ticket);
        $this->updatePricesOfOrder($ticket);
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
    
    public function updatePricesOfOrder($ticket){
        $this->calculateAndUpdateTotalPriceOfOrder($this->getOrderById($ticket->getOrderId()));
    }

    public function updatePriceOfOrderWithOrderId($order_id){
        $this->calculateAndUpdateTotalPriceOfOrder($this->getOrderById($order_id));
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
                return $this->orderRepository->getPriceAndQuantityOnYummyEvent($ticket->getEventId());
            case "jazz":
                return $this->orderRepository->getPriceAndQuantityOnJazzEvent($ticket->getEventId());
            case "history":
                return $this->orderRepository->getPriceAndQuantityOnHistoryEvent($ticket->getEventId());
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
           
    }

    public function orderPdf($body , $order_id)
    {
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

    public function orderPdfForPayment($order_id)
    {
        require '../vendor/autoload.php';
        $order = $this->getOrderById($order_id);
        $dompdf = new Dompdf(["chroot" => __DIR__]);


        $dompdf->loadHtml($this->assembleOrderPdfBody($order_id));

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        // Render the HTML as PDF
        $dompdf->render();

        $dompdf->addInfo("Title", "Order ".$order->getClientName());

        // Output the generated PDF to a string
        $pdfContent = $dompdf->output();
        file_put_contents("../public/order_".$order->getOrderId().".pdf", $pdfContent);
        return $pdfContent;
    }

    public function assembleOrderPdfBody($order_id){
        $order = $this->getOrderById($order_id);
        $jazzItems = $this->getAllTicketByTypeJazz($order_id);
        $historyItems = $this->getAllTicketByTypeHistory($order_id);
        $foodItems = $this->getAllTicketByTypeYummy($order_id);

        // Start output buffering
        ob_start();

        // Include the orderpdf.php file and execute its PHP code
        require __DIR__ . '/../views/admin/order/orderpdf.php';

        // Capture the output generated by the PHP code and store it in a variable
         $body = ob_get_clean();
         return $body;
    }

    public function ticketsPdfOnOrder($order_id) {
        $dompdf = new Dompdf(["chroot" => __DIR__]);
        $historyTickets = $this->getAllTicketByTypeHistory($order_id);
        $jazzTickets = $this->getAllTicketByTypeJazz($order_id);
        $yummyTickets = $this->getAllTicketByTypeYummy($order_id);

        $html = '';

        foreach ($jazzTickets as $ticket) {
            $html .= $this->getTicketBody('Jazz', $ticket['hall'],null, null,$ticket['datetime'], $ticket['quantity'], $ticket['price']);
        }

        foreach ($historyTickets as $ticket) {
            $html .= $this->getTicketBody('History', null,$ticket['name'], $ticket['start_location'], $ticket['datetime'], $ticket['quantity'], $ticket['price']);
        }

        foreach ($yummyTickets as $ticket) {
            $html .= $this->getTicketBody('Food', null,$ticket['name'], null, $ticket['datetime'], $ticket['quantity'], $ticket['price']);
        }

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $ticketspdf = $dompdf->output();
        file_put_contents("../public/tickets_".$order_id.".pdf", $ticketspdf);
        return $ticketspdf;
    }

    private function getTicketBody($type, $hall,$name, $start_location, $datetime, $quantity, $price){
        ob_start();
        require __DIR__ . "/../views/admin/order/ticket/ticketpdf$type.php";
        $body = ob_get_clean();
        return $body;
    }

    public function getLatestOrderId()
    {
        return $this->orderRepository->getLatestOrderId();
    }


}