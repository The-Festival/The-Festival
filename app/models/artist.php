<?php

class Artist{

    private $id;
    private $name;
    private $about;
    private $price;
    private $genre;

    public function __construct($id, $name, $about, $price, $genre){
        $this->id = $id;
        $this->name = $name;
        $this->about = $about;
        $this->price = $price;
        $this->genre = $genre;
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
}