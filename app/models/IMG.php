<?php

class IMG {
    private $foto_id;
    private $poi_id;
    private $filepath;
    private $isBanner;

    public function getFotoID(){
        return $this->foto_id;
    }
    public function getPOIID(){
        return $this->poi_id;
    }
    public function getFilepath(){
        return $this->filepath;
    }
    public function getIsBanner(){
        return $this->isBanner;
    }

}

?>