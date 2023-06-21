<?php

class Event
{

    // Properties
    private $id;
    private $artist_id;
    private $hall;
    private $price;
    private $seats;
    private $seats_left;
    private $time;

    // Constructor
    public function __construct($id, $artist_id, $hall, $price, $seats, $seats_left, $datetime)
    {
        $this->id = $id;
        $this->artist_id = $artist_id;
        $this->hall = $hall;
        $this->price = $price;
        $this->seats = $seats;
        $this->seats_left = $seats_left;
        $this->time = $datetime;
    }

    // Getters and setters
    public function getID()
    {
        return $this->id;
    }

    public function getArtistID()
    {
        return $this->artist_id;
    }

    public function getHall()
    {
        return $this->hall;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getSeats()
    {
        return $this->seats;
    }

    public function getSeatsLeft()
    {
        return $this->seats_left;
    }

    public function getTime()
    {
        return $this->time;
    }

    // Formatted getters
    public function getFormattedPrice()
    {
        // € xx,xx
        return '&euro; ' . number_format($this->price, 2, ',', '.');
    }

    public function getFormattedTime()
    {
        // dd/month written out hh:mm without year
        $date = date_create($this->time);
        return date_format($date, 'H:i d F');
    }



    // Methods 
    public function isSoldOut()
    {
        return $this->seats_left == 0;
    }

    public function buyTickets($amount)
    {
        if ($this->seats_left >= $amount) {
            $this->seats_left -= $amount;
            return true;
        } else {
            return false;
        }
    }
}
