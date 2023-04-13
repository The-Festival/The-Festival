<?php

class Session{
    public $session_id;
    public $restaurant_id;
    public $date;
    public $duration;
    public $seats_left;

    // public function __construct($session_id, $restaurant_id, $date, $duration, $seats_left){
    //     $this->session_id = $session_id;
    //     $this->restaurant_id = $restaurant_id;
    //     $this->date = $date;
    //     $this->duration = $duration;
    //     $this->seats_left = $seats_left;
    // }

    public function getSession_id(){
        return $this->session_id;
    }
    public function getRestaurant_id(){
        return $this->restaurant_id;
    }
    public function getDate(){
        return $this->date;
    }
    public function getDuration(){
        return $this->duration;
    }
    public function getSeats_left(){
        return $this->seats_left;
    }
}