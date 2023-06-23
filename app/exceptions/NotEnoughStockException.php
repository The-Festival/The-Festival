<?php

class NotEnoughStockException extends Exception
{
    public function __construct($message = "Sorry, there is no room any more see you next year ;)", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
