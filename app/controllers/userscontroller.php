<?php
include_once (__DIR__ . '/../services/userservice.php');


class UsersController{

    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }
    // functions called by controller 
    public function index(){
        $this->userService = new UserService();
        $action = $this->getRequestAction();
        try {
            switch($action) {
                case 'role':
                    $users = $this->handleRoleAction();
                    break;
                case 'id':
                    $users = $this->handleIdAction();
                    break;
                case 'delete':
                    $this->handleDeleteAction();
                    break;
                case 'add':
                    $users = $this->handleAddAction();
                    break;
                case 'update':
                    $users = $this->handleUpdateAction();
                    break;
                case 'search':
                    $users = $this->handleSearchAction();
                    break;
                case 'none':
                    $users = $this->userService->getAll();
                    break;
            }
        } catch (Exception $e) {
            echo "Error please check actions or inputs and try again";
        }
        catch(PDOException $e){
            echo "Server error please try again later";
        }
        
    
        include __DIR__ . '/../views/admin/userDashboard.php';
    }

    public function createuser(){
        include __DIR__ . '/../views/admin/createuser.php';
    }

    public function edituser(){
        if(!isset($_GET["id"])){
            header('Location: /users');
        }
        $id = $_GET["id"];
        $user = $this->userService->getUserById($id);
        include __DIR__ . '/../views/admin/edituser.php';
    }
    
    
    private function getRequestAction() {
        switch (true) {
            case isset($_GET["role"]):
                return 'role';
            case isset($_GET["id"]):
                return 'id';
            case isset($_GET["delete"]):
                return 'delete';
            case isset($_POST["add"]):
                return 'add';
            case isset($_POST["update"]):
                return 'update';
            case isset($_POST["search"]):
                return 'search';
            default:
                return 'none';
        }
    }
    
    

    
    private function handleRoleAction() {
        $role = $_GET["role"];
        return $this->userService->getUsersOnRole($role);
    }
    
    private function handleIdAction() {
        $id = $_GET["id"];
        return $this->userService->getUserById($id);
    }
    
    private function handleDeleteAction() {
        $id = $_GET["delete"];
        $this->userService->deleteUserbyId($id);
        header('Location: /users');
    }
    
    private function handleAddAction() {
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $role = $_POST["role"];
        $dateOfRegistration = $_POST["registration_date"];
        $this->userService->addUser($fullname, $email, $hashedPassword, $role , $dateOfRegistration);
        return $this->userService->getAll();
    }
    
    private function handleUpdateAction(){
        $id = $_POST["id"];
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $role = $_POST["role"];
        $dateOfRegistration = $_POST["registration_date"];
        $this->userService->updateUser($id, $fullname, $email,$role , $dateOfRegistration);
        return $this->userService->getAll();
    }

    private function handleSearchAction(){
       $search = $_POST["search"];
         if($search == ""){
              return $this->userService->getAll();
         }
         else{
              return $this->userService->searchUserByName($search);
         }
    }

   

}