<?php

include_once(__DIR__ . '/../services/orderservice.php');
include_once(__DIR__ . '/../services/userservice.php');
require __DIR__ . '/../services/adminservice.php';
require __DIR__ . '/../services/historyservice.php';
require __DIR__ . '/../services/artistservice.php';

class AdminController
{
    private $orderService;
    private $adminService;
    private $historyService;
    private $artistService;
    private $userService;
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

    public function processHistoryEvent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = htmlspecialchars($_POST["name"]);
            $sliderText = htmlspecialchars($_POST["sliderText"]);
            $sliderImage = $this->verifyFile($_FILES["sliderImage"]);
            $place = htmlspecialchars($_POST["place"]);
            $postalCode = htmlspecialchars($_POST["postalCode"]);
            $streetName = htmlspecialchars($_POST["streetName"]);
            $number = htmlspecialchars($_POST["number"]);
            $id = $this->adminService->processHistoryEvent($name, $sliderText, $sliderImage, $place, $postalCode, $streetName, $number);
            header('Location: /admin/editHistoryEvent?id=' . $id[0]->getPointOfInterest());
        }
    }

    public function editTextAndImage()
    {
        $textID = htmlspecialchars($_POST["textID"]);
        $imageID = htmlspecialchars($_POST["imgID"]);
        $text = htmlspecialchars($_POST["newText"]);
        $image = $this->verifyFile($_FILES["newFile"]);
        $this->adminService->editTextAndImage($textID, $imageID, $text, $image);
    }

    public function verifyFile($file)
    {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileType = $file['type'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        return $this->adminService->verifyFile($fileName, $fileTmpName, $fileType, $fileSize, $fileError);
    }

    public function editHistoryEvent()
    {
        $id = htmlspecialchars($_GET["id"]);
        $banner = $this->historyService->getPageBanner($id);
        $slider = $this->historyService->getSliderData();
        // $data = $this->adminService->getPageData($id);
        $data = $this->historyService->getPointOfInterestData($id);
        include __DIR__ . '/../views/admin/history/editHistoryEvent.php';
    }

    public function uploadBanner()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = htmlspecialchars($_POST["id"]);
            $bannerImage = $this->verifyFile($_FILES["bannerImage"]);
            $this->adminService->uploadBanner();
            header('Location: /admin/editHistoryEvent?id=' . $id);
        }
    }

    public function jazz()
    {
        include __DIR__ . '/../views/admin/artist.php';
    }

    public function userDashboard()
    {
        $this->userService = new UserService();
        if (isset($_GET["role"])) {
            $role = $_GET["role"];
            $users = $this->userService->getUsersOnRole($role);
        } else if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $users = $this->userService->getUserById($id);
        } else if (isset($_GET["delete"])) {
            $id = $_GET["delete"];
            $this->userService->deleteUserbyId($id);
            header('Location: /admin/userDashboard');
        } else if (isset($_POST["add"])) {
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $role = $_POST["role"];
            $dateOfRegistration = $_POST["registration_date"];
            $this->userService->addUser($fullname, $email, $hashedPassword, $role, $dateOfRegistration);
            $users = $this->userService->getAll();
        } else if (isset($_POST["update"])) {
            $id = $_POST["id"];
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $role = $_POST["role"];
            $dateOfRegistration = $_POST["registration_date"];
            $this->userService->updateUser($id, $fullname, $email, $role, $dateOfRegistration);
            $users = $this->userService->getAll();
        } else if (isset($_POST["search"])) {
            $search = $_POST["search"];
            if ($search == "") {
                $users = $this->userService->getAll();
            } else {
                $users = $this->userService->searchUserByName($search);
            }
        } else {
            $users = $this->userService->getAll();
        }
        include __DIR__ . '/../views/admin/userDashboard.php';
    }

    public function orderDashboard()
    {
        $this->orderService->checkRequests();
        $orders = $this->orderService->getOrders();
        include __DIR__ . '/../views/admin/order/orderDashboard.php';
    }

    public function ticketDashboard()
    {
        $this->orderService->checkTicketRequests();
    }
    public function editorder()
    {
        $this->orderService->checkRequests();
    }

    public function createorder()
    {
        include __DIR__ . '/../views/admin/order/createorder.php';
    }

    public function editTicket()
    {
        $this->orderService->checkRequests();
    }

    public function edituser()
    {
        $this->userService = new UserService();
        $id = $_GET["id"];
        $user = $this->userService->getUserById($id);
        include __DIR__ . '/../views/admin/edituser.php';
    }

    public function createuser()
    {
        include __DIR__ . '/../views/admin/createuser.php';
    }

    public function checkLogin()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
        }

        // if ($_SESSION['user']->getRole() != 'admin') {
        //     header('Location: /login');
        // }
    }
}
