<?php

class ReservationItem{
    private $session_id;
    private $request;
    private $count_people;
    private $reservation_fee;
    
    public function __construct ($session_id, $request, $count_people, $reservation_fee){
        $this->session_id = $session_id;
        $this->request = $request;
        $this->count_people = $count_people;
        $this->reservation_fee = $reservation_fee;
    }

    public function getSessionId(){
        return $this->session_id;
    }
    public function getRequest(){
        return $this->request;
    }
    public function getCountPeople(){
        return $this->count_people;
    }
    public function getReservationFee(){
        return $this->reservation_fee;
    }
}