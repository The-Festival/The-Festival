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
        $this->orderService->checkRequests();
        $orders = $this->orderService->getOrders();
        include __DIR__ . '/../views/admin/order/orderDashboard.php';
    }

    public function ticketDashboard(){
        $this->orderService->checkTicketRequests();
    }
    public function editorder(){
        $this->orderService->checkRequests();
    }

    public function createorder(){
        include __DIR__ . '/../views/admin/order/createorder.php';
    }

    public function editTicket(){
        $this->orderService->checkRequests();
    }

    public function checkLogin()
    {
        if(!isset($_SESSION['user'])){
            header('Location: /login');
        }
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
            echo $csvData;
            exit;
        }
        else{
            header('Location: /admin/orderDashboard');
        }
    }
    public function orderpdf(){
        if(isset($_GET['id'])){
            $order_id = $_GET['id'];
            $order = $this->orderService->getOrderById($order_id);
            $jazzItems = $this->orderService->getAllTicketByTypeJazz($order_id);
            $historyItems = $this->orderService->getAllTicketByTypeHistory($order_id);
            $foodItems = $this->orderService->getAllTicketByTypeYummy($order_id);
    
             // Start output buffering
             ob_start();
                
             // Include the offerMail.php file and execute its PHP code
             require __DIR__ . '/../views/admin/order/orderpdf.php';
             
             // Capture the output generated by the PHP code and store it in a variable
             $body = ob_get_clean();
             $this->orderService->orderPdf($body, $order_id);
             header('Location: /admin/orderDashboard');
        }
        else{
            http_response_code(404);
        }
    }
}
