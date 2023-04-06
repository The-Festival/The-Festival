<?php

class Artist{

    private $id;
    private $name;
    private $about;
    private $price;

    public function __construct($id, $name, $about, $price, ){
        $this->id = $id;
        $this->name = $name;
        $this->about = $about;
        $this->price = $price;
    }

    public function getID(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getAbout(){
        return $this->about;
    }
    
    public function getPrice(){
        return $this->price;
    }

    public function formatPrice(){
        return "€" . number_format($this->getPrice(), 2, ',', '.');
    }
}