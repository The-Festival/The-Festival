<?php 
include_once(__DIR__ . '/../repositories/repository.php');
include_once(__DIR__ . '/../models/Ticket.php');
include_once(__DIR__ . '/../models/Order.php');

class OrderRepository extends Repository {
    public function getOrders(){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Order`");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
            $result = $stmt->fetchAll();
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }

    public function getTickets(){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Ticket");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ticket');
            $result = $stmt->fetchAll();
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }

    public function getTicketById($ticket_id){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Ticket WHERE ticket_id = :ticket_id");
            $stmt->bindParam(':ticket_id', $ticket_id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ticket');
            $result = $stmt->fetch();
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }

    public function getOrderById($order_id){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Order` WHERE order_id = :order_id");
            $stmt->bindParam(':order_id', $order_id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
            $result = $stmt->fetch();
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }

    public function getTicketsByOrderId($order_id){
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Ticket WHERE order_id = :order_id");
            $stmt->bindParam(':order_id', $order_id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ticket');
            $result = $stmt->fetchAll();
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }

    public function deleteTicket($ticket_id){
        try {
            $stmt = $this->connection->prepare("DELETE FROM Ticket WHERE ticket_id = :ticket_id");
            $stmt->bindParam(':ticket_id', $ticket_id);
            $stmt->execute();
            return true;

        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }

    public function deleteOrderPlusAllTicketsOnOrder($order_id){
        try {
            $stmt = $this->connection->prepare("DELETE FROM Ticket WHERE order_id = :order_id");
            $stmt->bindParam(':order_id', $order_id);
            $stmt->execute();
            $stmt = $this->connection->prepare("DELETE FROM `Order` WHERE order_id = :order_id");
            $stmt->bindParam(':order_id', $order_id);
            $stmt->execute();
            return true;

        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }

    public function addOrder($order){
        try{
            $stmt = $this->connection->prepare("INSERT INTO `Order`(`client_name`, `address`, `phonenumber`, `emailaddress`, `order_time`, `payment_method`, `total_price`, `total_vat`) VALUES (':client_name',':address',':phonenumber',':emailaddress',':order_time',':payment_method',':total_price',':total_vat')");
            $stmt->bindParam(':client_name', $order->getClientName());
            $stmt->bindParam(':address', $order->getAddress());
            $stmt->bindParam(':phonenumber', $order->getPhonenumber());
            $stmt->bindParam(':emailaddress', $order->getEmailaddress());
            $stmt->bindParam(':order_time', $order->getOrderTime());
            $stmt->bindParam(':payment_method', $order->getPaymentMethod());
            $stmt->bindParam(':total_price', $order->getTotalPrice());
            $stmt->bindParam(':total_vat', $order->getTotalVat());
            $stmt->execute();
            return true;
        } catch(PDOException $e){
            echo $e;
            return false;
        }
        
    }

    public function addTicket($order_id,$event_type,$event_id,$vat_percentage,$quantity,$isChecked){
        try{
            $stmt = $this->connection->prepare("INSERT INTO `Ticket`(`order_id`, `event_type`, `event_id`, `vat_percentage`, `quantity`, `ischecked`) VALUES (:order_id,:event_type,:event_id,:vat_percentage,:quantity,:isChecked)");
            $stmt->bindParam(':order_id', $order_id);
            $stmt->bindParam(':event_type', $event_type);
            $stmt->bindParam(':event_id', $event_id);
            $stmt->bindParam(':vat_percentage', $vat_percentage);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':isChecked', $isChecked);
            $stmt->execute();
            return true;
        } catch(PDOException $e){
            echo $e;
            return false;
        }
        
    }

    public function updateTicket($ticket){
        try{
            $stmt = $this->connection->prepare("UPDATE `Ticket` SET `order_id`=':order_id',`event_type`=':event_type',`event_id`=':event_id',`vat_percentage`=':vat_percentage',`quantity`=':quantity',`ischecked`=':isChecked' WHERE ticket_id = :ticket_id");
            $stmt->bindParam(':ticket_id', $ticket->getTicketId());
            $stmt->bindParam(':order_id', $ticket->getOrderId());
            $stmt->bindParam(':event_type', $ticket->getEventType());
            $stmt->bindParam(':event_id', $ticket->getEventId());
            $stmt->bindParam(':vat_percentage', $ticket->getVatPercentage());
            $stmt->bindParam(':quantity', $ticket->getQuantity());
            $stmt->bindParam(':isChecked', $ticket->getIsChecked());
            $stmt->execute();
            return true;
        } catch(PDOException $e){
            echo $e;
            return false;
        }
        
    }

    public function updateOrder($order_id, $client_name, $address, $phonenumber, $emailaddress, $order_time, $payment_method, $total_price, $total_vat){
        try{
            $stmt = $this->connection->prepare("UPDATE `Order` SET `client_name`=:client_name, `address`=:address, `phonenumber`=:phonenumber, `emailaddress`=:emailaddress, `order_time`=:order_time, `payment_method`=:payment_method, `total_price`=:total_price, `total_vat`=:total_vat WHERE order_id = :order_id");
            $stmt->bindParam(':order_id', $order_id);
            $stmt->bindParam(':client_name', $client_name);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':phonenumber', $phonenumber);
            $stmt->bindParam(':emailaddress', $emailaddress);
            $stmt->bindParam(':order_time', $order_time);
            $stmt->bindParam(':payment_method', $payment_method);
            $stmt->bindParam(':total_price', $total_price);
            $stmt->bindParam(':total_vat', $total_vat);
            $stmt->execute();
            
            return true;
        } catch(PDOException $e){
            echo $e;
            return false;
        }
        
    }

    
    public function getAllTicketOnTypeYummy($order_id){
        try {
            $stmt = $this->connection->prepare("SELECT `ticket_id` ,`name` , `start_datetime` , `quantity` , `price` , `ischecked` FROM Ticket t 
            JOIN Reservation r1 ON t.event_id = r1.reservation_id AND t.event_type = 'yummy' AND order_id = :order_id
            JOIN Session s ON r1.session_id = s.session_id 
            JOIN Restraurant r ON s.restaurant_id = r.restaurant_id;");
            $stmt->bindParam(':order_id', $order_id);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }

    public function getAllTicketOnTypeJazz($order_id){
        try {
            $stmt = $this->connection->prepare("SELECT `ticket_id` ,`name`,`datetime` , `hall` , `quantity` , `price` , `ischecked` FROM Ticket 
            JOIN Event_Jazz ON Ticket.event_id = Event_Jazz.event_id 
            JOIN Artist ON Event_Jazz.artist_id = Artist.artist_id WHERE Ticket.event_type = 'jazz' AND order_id = :order_id;");
            $stmt->bindParam(':order_id', $order_id);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }

    public function getAllTicketOnTypeHistory($order_id){
        try {
            $stmt = $this->connection->prepare("SELECT `ticket_id`,`name`,`datetime`,`start_location` , `price`, `ischecked`
            FROM Ticket
            JOIN Tour ON Ticket.event_id = Tour.tour_id
            JOIN Language ON Tour.language_id = Language.language_id
            WHERE Ticket.event_type = 'history' AND order_id = :order_id;");
            $stmt->bindParam(':order_id', $order_id);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }

    }

    public function getAllYummyEvents(){
        try {
            $stmt = $this->connection->prepare("SELECT `reservation_id` , `name`, `start_datetime`,`price` FROM Reservation r JOIN Session s ON r.session_id = s.session_id JOIN Restraurant re ON s.restaurant_id = re.restaurant_id");
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }

    public function getAllJazzEvents(){
        try {
            $stmt = $this->connection->prepare("SELECT `event_id`, `name`, `datetime`, `hall` FROM `Event_Jazz` JOIN Artist ON Artist.artist_id = Event_Jazz.artist_id;");
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }

    public function getAllHistoryEvents(){
        try {
            $stmt = $this->connection->prepare("SELECT `tour_id`, `name`, `datetime`, `start_location`, `price`FROM Tour t JOIN Language l ON t.language_id = l.language_id");
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }






}
