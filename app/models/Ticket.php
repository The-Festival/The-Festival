<?php

class Ticket
{
    private $ticket_id;
    private $order_id;
    private $event_type;
    private $event_id;
    private $vat_percentage;
    private $quantity;
    private $ischecked;

    public function getTicketId()
    {
        return $this->ticket_id;
    }

    public function setTicketId($ticket_id)
    {
        $this->ticket_id = $ticket_id;
    }

    public function getOrderId()
    {
        return $this->order_id;
    }

    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }

    public function getEventType()
    {
        return $this->event_type;
    }

    public function setEventType($event_type)
    {
        $this->event_type = $event_type;
    }

    public function getEventId()
    {
        return $this->event_id;
    }

    public function setEventId($event_id)
    {
        $this->event_id = $event_id;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getIsChecked()
    {
        return $this->ischecked;
    }

    public function setIsChecked($ischecked)
    {
        $this->ischecked = $ischecked;
    }

    public function getVatPercentage()
    {
        return $this->vat_percentage;
    }

    public function setVatPercentage($vat_percentage)
    {
        $this->vat_percentage = $vat_percentage;
    }
}
