<?php

class About {
    private $about_id;
    private $detail_id;
    private $type;
    private $about;

    public function getAboutID(){
        return $this->about_id;
    }
    public function getPOIID(){
        return $this->detail_id;
    }
    public function getType(){
        return $this->type;
    }
    public function getAbout(){
        return $this->about;
    }
}
