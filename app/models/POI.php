<?php

class POI{
    private $pointOfInterest;
    private $about_id;
    private $photo_id;
    private $location_id;
    private $name;
    private $text;
    private $location;
    private $photo;

    //getters
    public function getPointOfInterest(){
        return $this->pointOfInterest;
    }

    public function getAboutID(){
        return $this->about_id;
    }
    public function getPhotoID(){
        return $this->photo_id;
    }
    public function getLocationID(){
        return $this->location_id;
    }


    public function getName(){
        return $this->name;
    }

    public function getText(){
        return $this->text;
    }
    public function getLocation(){
        return $this->location;
    }

    public function getPhoto(){
        return $this->photo;
    }

    //setter
    public function setPhoto($photo){
        $this->photo = $photo;
    }
    public function setLocation($location){
        $this->location = $location;
    }
    public function setlocationID($location_id){
        $this->location_id = $location_id;
    }
    public function setPhotoID($photo_id){
        $this->photo_id = $photo_id;
    }

    
}


?>