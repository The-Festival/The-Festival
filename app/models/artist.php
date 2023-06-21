<?php

class Artist
{

    // Properties
    private $id;
    private $name;
    private $about;
    private $events;

    // Constructor
    public function __construct($id, $name, $about)
    {
        $this->id = $id;
        $this->name = $name;
        $this->about = $about;
        $this->events = array();
    }

    // Getters and setters
    public function getID()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAbout()
    {
        return $this->about;
    }

    public function setAbout($about)
    {
        $this->about = $about;
    }

    public function getEvents()
    {
        return $this->events;
    }

    public function addEvent($event)
    {
        array_push($this->events, $event);
    }
}
