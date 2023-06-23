<?php
require_once(__DIR__ . '/../services/homeservice.php');
require_once(__DIR__ . '/../services/wzywigservice.php');

class Pagescontroller{
    private $homeService;
    private $wzywigService;

    function __construct(){
        $this->homeService = new HomeService();
        $this->wzywigService = new WzywigService();
    }

    public function index(){
        $aboutText = $this->homeService->getAboutText();
        $this->checkRequests();
        require __DIR__ . '/../views/wysiwyg/index.php';
    }

    public function upload(){
        $this->wzywigService->checkUpload();
    }

    public function checkRequests(){
        if(isset($_POST['aboutText'])){
            $this->homeService->updateAboutText($_POST['text']);
        }

        if(isset($_POST['events'])){
            $this->wzywigService->replace_file_content(__DIR__ . "/../views/home/cards.php",($_POST['content']));
        }
    }
}
?>