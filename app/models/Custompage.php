<?php
class Custompage {

    private $id;
    private $name;


    public function getID(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setID($id){
        $this->id = $id;
    }
}