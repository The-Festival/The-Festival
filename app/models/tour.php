<?php

class Tour{
    public $tour_ID;
    private $datetime;
    private $name;
    private $spaces_left;
    private $guide;
    private $price;

    public function getTourID(){
        return $this->tour_ID;
    }
    public function getDatetime(){
        return $this->datetime;
    }
    public function getName(){
        return $this->name;
    }
    public function getSpacesLeft(){
        return $this->spaces_left;
    }
    public function getGuide(){
        return $this->guide;
    }
    public function getPrice(){
        return $this->price;
    }
}