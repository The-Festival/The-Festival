<?php

class POI{
    private $pointOfInterest;
    private $text;
    private $location;
    private $photo;

    //getters
    public function getPointOfInterest(){
        return $this->pointOfInterest;
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

    
}


?>