<?php
include_once __DIR__ . '/../services/custompagesservice.php';
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
        $this->checkid();
        $customPage = $this->custompagesService->getById($_GET['id']);
        $pageName = $customPage->getName();

        require __DIR__ . '/../views/custompages/pages/' . $pageName . '.php';
    }
    private function checkid(){
        if($_GET['id'] == null || $_GET['id'] == '' || $this->custompagesService->getById($_GET['id']) == null){
            header('Location: /custompages/pageNotFound');
        }
    }
    public function pageNotFound(){
        require __DIR__ . '/../views/custompages/pagenotfound.php';
    }



}