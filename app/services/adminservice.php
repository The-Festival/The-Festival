<?php
require_once(__DIR__ . '/../repositories/adminrepository.php');

class AdminService{
    private $adminRepository;

    public function __construct()
    {
        $this->adminRepository = new AdminRepository();
    }

    public function processHistoryEvent($name, $sliderText, $sliderImage, $place, $postalCode, $streetName, $number){
        $this->adminRepository->addHistoryEvent($name, $sliderText, $sliderImage, $place, $postalCode, $streetName, $number);
        return $this->adminRepository->getHistoryEventIdByName($name);
    }

    public function uploadBanner($id, $bannerImage){
        $this->adminRepository->uploadBanner($id, $bannerImage);
    }

    public function editTextAndImage($textID, $imageID, $text, $image){
        $this->adminRepository->editTextAndImage($textID, $imageID, $text, $image);
    }

    public function editText($textID, $text){
        $this->adminRepository->editText($textID, $text);
    }

    public function addTextAndImage($id, $text, $image){
        $this->adminRepository->addTextAndImage($id, $text, $image);
    }

    public function deleteHistoryEvent($id){
        $this->adminRepository->deleteHistoryEvent($id);
    }

    public function verifyFile($fileName, $fileTmpName, $fileType, $fileSize, $fileError) {
        $fileExtension = $this->verifyPictureExtension($fileName);
        $this->checkForError($fileError);
        $this->checkFileSize($fileSize);

        $newFileName = uniqid('', true).".$fileExtension";

        $fileDestination = "/../public/img/$newFileName";

        move_uploaded_file($fileTmpName, __DIR__.$fileDestination);
        return "/img/$newFileName";
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