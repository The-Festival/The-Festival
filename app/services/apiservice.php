<?php
include_once __DIR__ . "/../repositories/apirepository.php";
class ApiService{
    private $apiRepository;
    public function __construct()
    {
        $this->apiRepository = new ApiRepository();
    }

    function generateApiToken(){
        $token = bin2hex(random_bytes(32));
        return $token;
    }

    function getAllData(){
        return $this->apiRepository->getAllData();
    }

    function addCompany($company_name){
        $token = $this->generateApiToken();
        $this->apiRepository->addCompany($token, $company_name);
    }

    function checkIfTokenExists($token){
        return $this->apiRepository->checkIfTokenExists($token);
    }
}