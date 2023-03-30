<?php

require __DIR__ . '/../services/adminservice.php';
require __DIR__ . '/../services/historyservice.php';

require __DIR__ . '/../services/userservice.php';

class AdminController{
    
    private $adminService;
    private $historyService;
    private $userService;

    public function __construct()
    {
        $this->historyService = new HistoryService();
        $this->adminService = new AdminService();
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
        $this->adminService->processHistoryEvent();
    }
    public function editHistoryEvent(){
        $id = htmlspecialchars($_GET["id"]);
        $banner = $this->historyService->getPageBanner($id);
        $slider = $this->historyService->getSliderData();
        $data = $this->historyService->getPointOfInterestData($id);
        include __DIR__ . '/../views/admin/history/editHistoryEvent.php';
    }
    public function uploadBanner(){
        $this->adminService->uploadBanner();
    }


    public function userDashboard(){
        $this->userService = new UserService();
        if(isset($_GET["role"])){
            $role = $_GET["role"];
            $users = $this->userService->getUsersOnRole($role);
        }
        else if (isset($_GET["id"])){
            $id = $_GET["id"];
            $users = $this->userService->getUserById($id);
        }
        else if (isset($_GET["delete"])){
            $id = $_GET["delete"];
            $this->userService->deleteUserbyId($id);
            header('Location: /admin/userDashboard');
        }
        else if (isset($_POST["add"])){
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $role = $_POST["role"];
            $dateOfRegistration = $_POST["registration_date"];
            $this->userService->addUser($fullname, $email, $hashedPassword, $role , $dateOfRegistration);
            $users = $this->userService->getAll();
        }
        else if (isset($_POST["update"])){
            $id = $_POST["id"];
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $role = $_POST["role"];
            $dateOfRegistration = $_POST["registration_date"];
            $this->userService->updateUser($id, $fullname, $email,$role , $dateOfRegistration);
            $users = $this->userService->getAll();
        }
        else if (isset($_POST["search"])){
            $search = $_POST["search"];
            if($search == ""){
                $users = $this->userService->getAll();
            }
            else{
                $users = $this->userService->searchUserByName($search);
            }
        }
        else{
            $users = $this->userService->getAll();
        }
        include __DIR__ . '/../views/admin/userDashboard.php';
    }

    public function edituser(){
        $this->userService = new UserService();
        $id = $_GET["id"];
        $user = $this->userService->getUserById($id);
        include __DIR__ . '/../views/admin/edituser.php';
    }

    public function createuser(){
        include __DIR__ . '/../views/admin/createuser.php';
    }

    public function checkLogin()
    {
        if(!isset($_SESSION['user'])){
            header('Location: /login');
        }
    }
}