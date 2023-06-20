<?php
include_once(__DIR__ . '/../services/paymentservice.php');

class PaymentController {

    private $paymentService;

    public function __construct()
    {
        $this->paymentService = new PaymentService();
    }


    public function sendMail(){
        //test prupase simple get to /payment/sendmail?id=1
        $this->paymentService->sendMail($_GET['id']);
    }







}
