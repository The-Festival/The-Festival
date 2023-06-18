<?php
class CustompagesController {
    private $custompagesService;
    public function __construct()
    {
        $this->custompagesService = new CustompagesService();
    }

    public function index()
    {
        $customPages = $this->custompagesService->getAll();
        require __DIR__ . '/../views/custompages/index.php';
    }

    public function page(){
        if($_GET['id'] == null || $_GET['id'] == '' || $this->custompagesService->getById($_GET['id']) == null){
           header('Location: /custompages/pageNotFound');
        }
        echo $_GET['id'];
        $customPage = $this->custompagesService->getById($_GET['id']);
        $pageName = $customPage->getName();

        require __DIR__ . '/../views/custompages/pages/' . $pageName . '.php';
    }

    public function pageNotFound(){
        require __DIR__ . '/../views/custompages/pagenotfound.php';
    }



}