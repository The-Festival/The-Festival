<?php 

class Order{

    private $order_id;

    private $client_name;

    private $address;

    private $phonenumber;

    private $emailaddress;

    private $order_time;

    private $payment_method;

    private $total_price;

    private $total_vat;	

    public function getOrderId(){
        return $this->order_id;
    }

    public function setOrderId($order_id){
        $this->order_id = $order_id;
    }

    public function getClientName(){
        return $this->client_name;
    }

    public function setClientName($client_name){
        $this->client_name = $client_name;
    }

    public function getAddress(){
        return $this->address;
    }

    public function setAddress($address){
        $this->address = $address;
    }

    public function getPhonenumber(){
        return $this->phonenumber;
    }

    public function setPhonenumber($phonenumber){
        $this->phonenumber = $phonenumber;
    }

    public function getEmailaddress(){
        return $this->emailaddress;
    }

    public function setEmailaddress($emailaddress){
        $this->emailaddress = $emailaddress;
    }

    public function getOrderTime(){
        return $this->order_time;
    }

    public function setOrderTime($order_time){
        $this->order_time = $order_time;
    }

    public function getPaymentMethod(){
        return $this->payment_method;
    }

    public function setPaymentMethod($payment_method){
        $this->payment_method = $payment_method;
    }

    public function getTotalPrice(){
        return $this->total_price;
    }

    public function setTotalPrice($total_price){
        $this->total_price = $total_price;
    }

    public function getTotalVat(){
        return $this->total_vat;
    }

    public function setTotalVat($total_vat){
        $this->total_vat = $total_vat;
    }

    

}