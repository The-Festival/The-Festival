<?php
include_once __DIR__ . '/../services/custompagesservice.php';
class CustompageAdminController{

    private $custompageService;
    public function __construct()
    {
        $this->custompageService = new CustompagesService();
    }

    public function index(){

        $customPages = $this->custompageService->getAll();
        require __DIR__ . '/../views/custompageadmin/index.php';
    }

    public function create(){
        require __DIR__ . '/../views/custompageadmin/create.php';
    }

    public function createpage(){
        $this->custompageService->add(htmlspecialchars($_POST['name']));
        //create file with name
        $this->custompageService->createFile(htmlspecialchars($_POST['name']));
        $this->createFile(htmlspecialchars($_POST['name']));

        header('Location: /custompageadmin');
    }

    public function deletepage(){
        $pageToDelete = $this->custompageService->getById($_GET['id']);
        $name = $pageToDelete->getName();
        $this->custompageService->deleteFile($name);
        $this->custompageService->delete($_GET['id']);

        header('Location: /custompageadmin');
    }




}