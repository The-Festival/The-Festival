<?php
include_once __DIR__ . "/../services/apiservice.php";
class ApiController {

    private $apiService;

    public function __construct()
    {
        $this->apiService = new ApiService();
    }

    function index(){
        echo "<h1>WRONG LINK<h1/>";
    }

    function checkAuthentication(){

    }

    function orders(){
        if(isset($_SERVER['HTTP_AUTHORIZATION'])){
            $authHeader = $_SERVER['HTTP_AUTHORIZATION'];
            $token = explode(' ', $authHeader);

            if(isset($token[1]) && $this->apiService->checkIfTokenExists($token[1])){
                $data = $this->apiService->getAllOrders();
                echo json_encode($data);
            }
            else{
                $this->respond(401, "Unauthorized");
            }
        }
        else{
            $this->respond(401, "Unauthorized");
        }

    }

    function dashboard(){
        $this->checkLogin();
        $data = $this->apiService->getAllData();
        include_once __DIR__ . "/../views/api/dashboard.php";
    }

    private function checkLogin()
    {
        if(!isset($_SESSION['user'])){
            header('Location: /login');
        }
    }

    public function addCompany(){
        if(isset($_POST['addCompany'])){
            $this->apiService->addCompany($_POST['companyName']);
        }
        header('Location: /api/dashboard');
    }

    public function deleteToken(){
        if(isset($_GET['id'])){
            $this->apiService->deleteCompany($_GET['id']);
        }
        header('Location: /api/dashboard');
    }

    function respond($errorCode, $errorMessage) {
        http_response_code($errorCode);

        $errorResponse = array(
            "error" => array(
                "code" => $errorCode,
                "message" => $errorMessage
            )
        );

        header('Content-Type: application/json');
        echo json_encode($errorResponse);
    }

}