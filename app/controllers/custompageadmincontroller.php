<?php
include_once( __DIR__ . '/../services/custompagesservice.php');
include_once(__DIR__ . '/../services/wzywigservice.php');
class CustompageAdminController
{

    private $custompageService;
    private $wysiwygService;

    public function __construct()
    {
        $this->custompageService = new CustompagesService();
        $this->wysiwygService = new WzywigService();
    }

    public function index()
    {

        $customPages = $this->custompageService->getAll();
        require __DIR__ . '/../views/custompageadmin/index.php';
    }

    public function create()
    {
        require __DIR__ . '/../views/custompageadmin/create.php';
    }

    public function createpage()
    {
        if (isset($_POST['name'])) {
            $this->custompageService->add(htmlspecialchars($_POST['name']));
            //create file with name
            $this->custompageService->createFile(htmlspecialchars($_POST['name']));
            header('Location: /custompageadmin');
        } else {
            header('Location: /custompage/pageNotFound');
        }
    }

    public function deletepage()
    {
        if (isset($_GET['id']) && $this->custompageService->getById($_GET['id']) != null) {
            $customPage = $this->custompageService->getById($_GET['id']);
            $pageName = $customPage->getName();
            $this->custompageService->deleteFile($pageName);
            $this->custompageService->delete($_GET['id']);
            header('Location: /custompageadmin');
        } else {
            header('Location: /custompage/pageNotFound');
        }

    }

    public function edit()
    {
        if ($this->checkid()) {
            $id = htmlspecialchars($_GET['id']);
            $name = $this->getNameOfPage(htmlspecialchars($_GET['id']));
            $pageContent = $this->getPageContent($name);
            require __DIR__ . '/../views/custompageadmin/editcustompage.php';
        } else {
            header('Location: /custompages/pageNotFound');
        }
    }

    public function editPage(){
        if(isset($_POST['editpage'])){
            $name = $this->getNameOfPage(htmlspecialchars($_GET['id']));
            $this->wysiwygService->replace_file_content(__DIR__ . "/../views/custompages/". $name .".php", $_POST['content']);
            header('Location: /custompageadmin');
        }
        else{
            header('Location: /custompages/pageNotFound');
        }

    }


    public function upload(){
        $this->wysiwygService->checkUpload();
    }


    private function checkid()
    {
        if ($_GET['id'] == null || $_GET['id'] == '' || $this->custompageService->getById($_GET['id']) == null) {
            header('Location: /custompages/pageNotFound');
        }
        else {
            return true;
        }
    }

    private function getNameOfPage($id)
    {
        $customPage = $this->custompageService->getById(htmlspecialchars($id));
        $pageName = $customPage->getName();
        return $pageName;
    }

    private function getPageContent($name)
    {
        $content = $this->custompageService->getFileContent($name);
        return $content;
    }


}