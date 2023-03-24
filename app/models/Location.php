<?php

class Location{
    private $location_id;
    private $detail_id;
    private $type;
    private $place_name;
    private $streetname;
    private $postalcode;
    private $city;
    private $housenumber;


    public function getLocation_id(){
        return $this->location_id;
    }

    public function getDetail_id(){
        return $this->detail_id;
    }

    public function getType(){
        return $this->type;
    }

    public function getPlace_name(){
        return $this->place_name;
    }

    public function getStreetname(){
        return $this->streetname;
    }

    public function getPostalcode(){
        return $this->postalcode;
    }

    public function getCity(){
        return $this->city;
    }

    public function getHousenumber(){
        return $this->housenumber;
    }

    public function setLocation_id($location_id){
        $this->location_id = $location_id;
    }

    public function setDetail_id($detail_id){
        $this->detail_id = $detail_id;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function setPlace_name($place_name){
        $this->place_name = $place_name;
    }

    public function setStreetname($streetname){
        $this->streetname = $streetname;
    }

    public function setPostalcode($postalcode){
        $this->postalcode = $postalcode;
    }

    public function setCity($city){
        $this->city = $city;
    }

    public function setHousenumber($housenumber){
        $this->housenumber = $housenumber;
    }
}