<?php
include_once __DIR__ . "/../repositories/apirepository.php";
include_once __DIR__ . "/../repositories/orderrepository.php";
class ApiService{
    private $apiRepository;
    private $orderRepository;
    public function __construct()
    {
        $this->apiRepository = new ApiRepository();
        $this->orderRepository = new OrderRepository();
    }

    function generateApiKey() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    function getAllData(){
        return $this->apiRepository->getAllData();
    }

    function getAllOrders(){
        return $this->orderRepository->getOrders();
    }

    function addCompany($company_name){
        $token = $this->generateApiKey();
        $this->apiRepository->addCompany($token, $company_name);
    }

    function checkIfTokenExists($token){
        return $this->apiRepository->checkIfTokenExists($token);
    }

    function deleteCompany($token_id){
        $this->apiRepository->deleteCompany($token_id);
    }
}