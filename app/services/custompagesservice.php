<?php
include_once __DIR__ . '/../models/custompage.php';
include_once __DIR__ . '/../repositories/custompagesrepository.php';
class CustompagesService{
    private $custompagesRepository;

    public function __construct(){
        $this->custompagesRepository = new CustompagesRepository();
    }

    public function checkIfPagesExists(){

        if($this->custompagesRepository->getAll() == null){
            return false;
        }
        return true;
    }

    public function getAll(){
        return $this->custompagesRepository->getAll();
    }

    public function getById($id){
        return $this->custompagesRepository->getById($id);
    }

    public function update($id, $name){
        $this->custompagesRepository->update($id, $name);
    }

    public function delete($id){
        $this->custompagesRepository->delete($id);
    }

    public function add($name){
        $this->custompagesRepository->add($name);
    }
}
