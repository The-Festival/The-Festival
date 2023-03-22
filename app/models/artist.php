<?php

class Artist {
    private $id;
    private $name;
    private $description;
    private $price;
    
    public function __construct($id, $name, $description, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}