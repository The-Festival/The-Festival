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
            $this->apiService->deleteToken($_GET['id']);
        }
        header('Location: /api/dashboard');
    }
}