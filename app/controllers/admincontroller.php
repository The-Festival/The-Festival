<?php

include_once (__DIR__ . '/../services/orderservice.php');
include_once (__DIR__ . '/../services/userservice.php');
require __DIR__ . '/../services/adminservice.php';
require __DIR__ . '/../services/historyservice.php';
require __DIR__ . '/../services/artistservice.php';



class AdminController{
    
    private $orderService;
    private $adminService;
    private $historyService;
    private $artistService;
    public $artists;

    public function __construct()
    {

        $this->orderService = new OrderService();
        $this->historyService = new HistoryService();
        $this->adminService = new AdminService();
        $this->artistService = new ArtistService();
        $this->artists = $this->artistService->getAllArtists();

    }

    public function index()
    {
        //$this->checkLogin();
        include __DIR__ . '/../views/admin/dashboard.php';
    }


    public function historyDashboard()
    {
        $data = $this->historyService->getSliderData();
        include __DIR__ . '/../views/admin/history/historyDashboard.php';
    }
    
    public function addHistoricalPlace()
    {
        include __DIR__ . '/../views/admin/history/createHistoryEvent.php';
    }
    
    public function processHistoryEvent(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = htmlspecialchars($_POST["name"]);
            $sliderText = htmlspecialchars($_POST["sliderText"]);
            $sliderImage = $this->verifyFile($_FILES["sliderImage"]);
            $place = htmlspecialchars($_POST["place"]);
            $postalCode = htmlspecialchars($_POST["postalCode"]);
            $streetName = htmlspecialchars($_POST["streetName"]);
            $number = htmlspecialchars($_POST["number"]);
            $id = $this->adminService->processHistoryEvent($name, $sliderText, $sliderImage, $place, $postalCode, $streetName, $number);
            header('Location: /admin/editHistoryEvent?id='.$id[0]->getPointOfInterest());
        }
    }

    public function editTextAndImage(){
        if($_FILES["newFile"]["name"] != ""){
            var_dump($_FILES["newFile"]);
            // echo "file";
            $textID = htmlspecialchars($_POST["textID"]);
            $imageID = htmlspecialchars($_POST["imgID"]);
            $text = htmlspecialchars($_POST["newText"]);
            $image = $this->verifyFile($_FILES["newFile"]);
            $this->adminService->editTextAndImage($textID, $imageID, $text, $image);
        } else {
            $textID = htmlspecialchars($_POST["textID"]);
            $text = htmlspecialchars($_POST["newText"]);
            $this->adminService->editText($textID, $text);
        }
        header('Location: /admin/editHistoryEvent?id='.htmlspecialchars($_POST["POIID"]));
    }

    public function addTestAndImage(){
        $text = htmlspecialchars($_POST["newText"]);
        $id = htmlspecialchars($_POST["POIID"]);
        $image = $this->verifyFile($_FILES["newFile"]);
        $this->adminService->addTextAndImage($id, $text, $image);
        header('Location: /admin/editHistoryEvent?id='.$id);
    }

    public function deleteHistoryEvent(){
        $id = htmlspecialchars($_GET["id"]);
        $this->adminService->deleteHistoryEvent($id);
        header('Location: /admin/historyDashboard');
    }

    public function tourdashboard()
    {
        $tours = $this->historyService->getTourInfo();
        include __DIR__ . '/../views/admin/history/tourDashboard.php';
    }
    
    public function verifyFile($file){
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileType = $file['type'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        
        return $this->adminService->verifyFile($fileName, $fileTmpName, $fileType, $fileSize, $fileError);
    }
    
    public function editHistoryEvent(){
        $id = htmlspecialchars($_GET["id"]);
        $banner = $this->historyService->getPageBanner($id);
        $slider = $this->historyService->getSliderData();
        // $data = $this->adminService->getPageData($id);
        $data = $this->historyService->getPointOfInterestData($id);
        include __DIR__ . '/../views/admin/history/editHistoryEvent.php';
    }
    
    public function uploadBanner(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = htmlspecialchars($_GET["id"]);
            $bannerImage = $this->verifyFile($_FILES["file"]);
            $this->adminService->uploadBanner($id, $bannerImage);
            header('Location: /admin/editHistoryEvent?id='.$id);
        }
    }

    public function Jazz()
    {
        include __DIR__ . '/../views/admin/jazz.php';
    }

    public function orderDashboard(){
        switch (true){
            case isset($_POST['editOrder']):{
                $this->editOrderAction();
                break;
            }
            case isset($_POST['createOrder']):{
                $this->addOrderAction();
                break;
            }
            case isset($_GET['deleteOrder']):{
                $this->deleteOrderAction();
                break;
            }
        }
        $orders = $this->orderService->getOrders();
        include __DIR__ . '/../views/admin/order/orderDashboard.php';
    }


    private function addOrderAction(){
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
        $this->orderService->addOrder($order);
    }

    private function editOrderAction(){
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
        $this->orderService->updateOrder($order);
    }

    private function deleteOrderAction(){
        if (!isset($_GET['deleteOrder'])){
            $this->orderDashboard();
            return;
        }
        $this->orderService->deleteOrderPlusAllTicketsOnOrder($_GET['deleteOrder']);
    }

    private function getOrderToEdit(){
        $order = $this->orderService->getOrderById($_GET['editOrder']);
            include __DIR__ . '/../views/admin/order/editOrder.php';
    }


    public function ticketDashboard(){
             //For cases where 5 or less lines of code extra to function is not used
             switch(true){
                case isset($_GET['ticketsOrder']):{
                    $this->getTicketsOnOrderAction();
                    break;
                }
                case isset($_GET['deleteTicket']) && isset($_GET['order']):{
                    $this->deleteTicketOnOrderAction();
                    break;
                }
                case isset($_GET['editTicket']) && isset($_GET['order']):{
                    $ticket = $this->orderService->getTicketById($_GET['editTicket']);
                    include __DIR__ . '/../views/admin/order/ticket/editTicket.php';
                    break;
                }
                case isset($_POST['editTicket']):{
                    $this->editTicketOnOrderAction();
                    break;
                }
                case isset($_GET['addYummyTicketToOrder']):{
                    $order_id = $_GET['addYummyTicketToOrder'];
                    $yummyEvents = $this->orderService->getAllYummyEvents();
                    include __DIR__ . '/../views/admin/order/ticket/addYummyTicket.php';
                    break;
                }
                case isset($_POST['addYummyTicketToOrder']):{
                    $this->addTicketToOrderAction("yummy");
                    break;
                }
                case isset($_GET['addJazzTicketToOrder']):{
                    $order_id = $_GET['addJazzTicketToOrder'];
                    $jazzEvents = $this->orderService->getAllJazzEvents();
                    include __DIR__ . '/../views/admin/order/ticket/addJazzTicket.php';
                    break;
                }
                case isset($_POST['addJazzTicketToOrder']):{
                    $this->addTicketToOrderAction("jazz");
                   break;
                }
                case isset($_GET['addHistoryTicketToOrder']):{
                    $order_id = $_GET['addHistoryTicketToOrder'];
                $historyEvents = $this->orderService->getAllHistoryEvents();
                include __DIR__ . '/../views/admin/order/ticket/addHistoryTicket.php';
                    break;
                }
                case isset($_POST['addHistoryTicketToOrder']):{
                    $this->addTicketToOrderAction("history");
                    break;
                }
                default:{
                    echo "<h1>NO ORDER SELECTED</h1>";
                    break;
                }
            }
    }   

    private function addTicketToOrderAction($type){
        $ticket = new Ticket();
        $ticket->setOrderId($_POST['order_id']);
        $ticket->setEventId($_POST['event_id']);
        $ticket->setEventType($type);
        $ticket->setVatPercentage($_POST['vat_percentage']);
        $ticket->setQuantity($_POST['quantity']);
        $ticket->setIsChecked($_POST['is_checked']);
        $this->orderService->addTicket($ticket);
        header("Location: /admin/ticketdashboard?ticketsOrder=" . $_POST['order_id']);
    }

    private function editTicketOnOrderAction(){
            $ticket = new Ticket();
            $ticket->setTicketId($_POST['ticket_id']);
            $ticket->setOrderId($_POST['order_id']);
            $ticket->setEventId($_POST['event_id']);
            $ticket->setEventType($_POST['event_type']);
            $ticket->setVatPercentage($_POST['vat_percentage']);
            $ticket->setQuantity($_POST['quantity']);
            $ticket->setIsChecked($_POST['is_checked']);
            $this->orderService->updateTicket($ticket);
            header("Location: /admin/ticketdashboard?ticketsOrder=" . $_POST['order_id']);
    }

    private function deleteTicketOnOrderAction(){
        $this->orderService->deleteTicket($_GET['deleteTicket']);
            $order_id = $_GET['order'];
            $yummyTickets = $this->orderService->getAllTicketByTypeYummy($order_id);
            $jazzTickets = $this->orderService->getAllTicketByTypeJazz($order_id);
            $historyTickets = $this->orderService->getAllTicketByTypeHistory($order_id);
            include __DIR__ . '/../views/admin/order/ticket/tickets.php';
    }
    private function getTicketsOnOrderAction(){
        $order_id = $_GET['ticketsOrder'];
            $yummyTickets = $this->orderService->getAllTicketByTypeYummy($order_id);
            $jazzTickets = $this->orderService->getAllTicketByTypeJazz($order_id);
            $historyTickets = $this->orderService->getAllTicketByTypeHistory($order_id);
            include __DIR__ . '/../views/admin/order/ticket/tickets.php';
    }

    public function editorder(){
        if (!isset($_GET['editOrder'])){
           header('Location: /admin/orderDashboard');
        }
        $order = $this->orderService->getOrderById($_GET['editOrder']);
        include __DIR__ . '/../views/admin/order/editOrder.php';
    }

    public function createorder(){
        include __DIR__ . '/../views/admin/order/createorder.php';
    }


    public function exportorder(){
        require __DIR__ . '/../views/admin/order/exportcsvcolomnselect.php';
    }
    
    public function orderexportcsv(){
        if(isset($_POST['csv'])){
            ob_start();
            $this->orderService->exportOrderAsCsv($_POST);
            $csvData = ob_get_clean();
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment; filename="orderdata.csv";');
            readfile("orderdata_".date('Y-m-d').".csv");
            echo $csvData;
            exit;
        }
        else{
            header('Location: /admin/orderDashboard');
        }
    }
    public function orderpdf(){
        if(isset($_GET['id'])){
            $order_id = htmlspecialchars($_GET['id']);
            $body = $this->orderService->assembleOrderPdfBody($order_id);
             $this->orderService->orderPdf($body, $order_id);
        }
        else{
            http_response_code(404);
        }
    }
    
    public function checkLogin()
    {
        if(!isset($_SESSION['user'])){
            header('Location: /login');
        }
    }
}
