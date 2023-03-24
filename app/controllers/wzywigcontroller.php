<?php
require_once(__DIR__ . '/../services/homeservice.php');

class WzywigController{
    private $homeService;

    function __construct(){
        $this->homeService = new HomeService();
    }

    public function index(){
        if(isset($_POST['aboutText'])){
            $this->homeService->updateAboutText($_POST['text']);
        }
        $aboutText = $this->homeService->getAboutText();
        //var_dump($aboutText);
        require __DIR__ . '/../views/wzywig/index.php';
    }
}
?>