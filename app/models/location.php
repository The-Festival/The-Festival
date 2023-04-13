<?php

class Location
{
    private $location_id;
    private $detail_id;
    private $streetname;
    private $postalcode;
    private $city;
    private $housenumber;

    public function getLocationID()
    {
        return $this->location_id;
    }
    public function getPOIID()
    {
        return $this->detail_id;
    }
    public function getStreetName()
    {
        return $this->streetname;
    }
    public function getPostalCode()
    {
        return $this->postalcode;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function getHousenumber()
    {
        return $this->housenumber;
    }
}
