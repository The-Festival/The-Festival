<?php

include_once (__DIR__ . '/../services/orderservice.php');

include_once (__DIR__ . '/../services/userservice.php');

class AdminController{
    
    private $orderService;

    private $userService;

    public function __construct()
    {
        $this->orderService = new OrderService();
    }

    public function index()
    {
        //$this->checkLogin();
        include __DIR__ . '/../views/admin/dashboard.php';
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