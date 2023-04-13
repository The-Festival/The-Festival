<?php
class Restaurant
{
    private $restaurant_id;
    private $name;
    private $cuisine;

    public function __construct($restaurant_id, $name, $cuisine)
    {
        $this->restaurant_id = $restaurant_id;
        $this->name = $name;
        $this->cuisine = $cuisine;
    }

    public function getRestaurant_id()
    {
        return $this->restaurant_id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getCuisine()
    {
        return $this->cuisine;
    }
}
