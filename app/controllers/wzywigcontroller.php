<?php
require_once(__DIR__ . '/../services/homeservice.php');
require_once(__DIR__ . '/../services/wzywigservice.php');

class WzywigController{
    private $homeService;
    private $wzywigService;

    function __construct(){
        $this->homeService = new HomeService();
        $this->wzywigService = new WzywigService();
    }

    public function index(){
        $aboutText = $this->homeService->getAboutText();

        require __DIR__ . '/../views/wzywig/index.php';
    }

    public function upload(){
        $this->wzywigService->checkUpload();
    }
}
?>