<?php
require_once(__DIR__ . '/../repositories/adminrepository.php');

class AdminService{
    private $adminRepository;

    public function __construct()
    {
        $this->adminRepository = new AdminRepository();
    }

    public function processHistoryEvent(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = htmlspecialchars($_POST["name"]);
            $sliderText = htmlspecialchars($_POST["sliderText"]);
            $sliderImage = $this->verifyFile($_FILES["sliderImage"]);
            $place = htmlspecialchars($_POST["place"]);
            $postalCode = htmlspecialchars($_POST["postalCode"]);
            $streetName = htmlspecialchars($_POST["streetName"]);
            $number = htmlspecialchars($_POST["number"]);
            $this->adminRepository->addHistoryEvent($name, $sliderText, $sliderImage, $place, $postalCode, $streetName, $number);
            $id = $this->adminRepository->getHistoryEventIdByName($name);
            header('Location: /admin/editHistoryEvent?id='.$id[0]->getPointOfInterest());
        }
        
    }

    public function uploadBanner(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = htmlspecialchars($_POST["id"]);
            $bannerImage = $this->verifyFile($_FILES["bannerImage"]);
            $this->adminRepository->uploadBanner($id, $bannerImage);
            header('Location: /admin/editHistoryEvent?id='.$id);
        }
    }

    private function verifyFile($file) {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileType = $file['type'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        $fileExtension = $this->verifyPictureExtension($fileName);
        $this->checkForError($fileError);
        $this->checkFileSize($fileSize);

        $newFileName = uniqid('', true).".$fileExtension";

        $fileDestination = "/../public/img/$newFileName";

        move_uploaded_file($fileTmpName, __DIR__.$fileDestination);
    
        return "/images/$newFileName";
    }

    private function verifyPictureExtension($fileName){
        $fileExtension = explode('.', $fileName);
        $fileLowerExtension = strtolower(end($fileExtension));

        $allowed = array('jpg','png','jpeg');

        if(in_array($fileLowerExtension, $allowed) == false){
            header("Location: http://localhost/add?erroMessage=you can only upload jpg, jpeg and png files");
        }
        return $fileLowerExtension;
    }

    private function checkForError($fileError){
        if($fileError != 0){
            header("Location: http://localhost/add?erroMessage=an error occured while uploading your file please try again");
        }
    }

    private function checkFileSize($fileSize){
        if($fileSize > 1000000){
            header("Location: http://localhost/add?erroMessage=you file was to big please try uploading a file smaller than 1mb");
        }
    }
}