<?php

class ReservationItem{
    private $reservation_id;
    private $session_id;
    private $user_id;
    private $request;
    private $count_people;
    private $reservation_fee;
    
    public function __construct($reservation_id, $session_id, $user_id, $request, $count_people, $reservation_fee){
        $this->reservation_id = $reservation_id;
        $this->session_id = $session_id;
        $this->user_id = $user_id;
        $this->request = $request;
        $this->count_people = $count_people;
        $this->reservation_fee = $reservation_fee;
    }

    // public function __construct ($session_id, $request, $count_people, $reservation_fee){
    //     $this->session_id = $session_id;
    //     $this->request = $request;
    //     $this->count_people = $count_people;
    //     $this->reservation_fee = $reservation_fee;
    // }

    public function getReservationId(){
        return $this->reservation_id;
    }
    public function getSessionId(){
        return $this->session_id;
    }
    public function getUserId(){
        return $this->user_id;
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