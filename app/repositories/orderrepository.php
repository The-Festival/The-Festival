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

    public function getOrdersByColumn($columns){
        try {
            $columnsString = $this->getSelectedColumns($columns);
            $stmt = $this->connection->prepare("SELECT ". $columnsString." FROM `Order` ");
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;

        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }

    function getSelectedColumns($data) {
        $columns = array(
            'order_id',
            'client_name',
            'address',
            'phonenumber',
            'emailaddress',
            'order_time',
            'payment_method',
            'total_vat',
            'total_price'
        );
        $selectedColumns = array();
        foreach ($columns as $column) {
            if (isset($data[$column])) {
                $selectedColumns[] = $column;
            }
        }
        return implode(', ', array_map(function ($column) {
            return "`$column`";
        }, $selectedColumns));
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
            // var_dump($order);
            $stmt = $this->connection->prepare("INSERT INTO `Order`(`client_name`, `address`, `phonenumber`, `emailaddress`, `order_time`, `payment_method`, `total_price`, `total_vat`) VALUES (:client_name,:address,:phonenumber,:emailaddress,:order_time,:payment_method,:total_price,:total_vat)");
            $stmt->bindValue(':client_name', $order->getClientName());
            $stmt->bindValue(':address', $order->getAddress());
            $stmt->bindValue(':phonenumber', $order->getPhonenumber());
            $stmt->bindValue(':emailaddress', $order->getEmailaddress());
            $stmt->bindValue(':order_time', $order->getOrderTime());
            $stmt->bindValue(':payment_method', $order->getPaymentMethod());
            $stmt->bindValue(':total_price', $order->getTotalPrice());
            $stmt->bindValue(':total_vat', $order->getTotalVat());
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
            $stmt = $this->connection->prepare("UPDATE `Ticket` SET `order_id`=:order_id,`event_type`=:event_type,`event_id`=:event_id,`vat_percentage`=:vat_percentage,`quantity`=:quantity,`ischecked`=:isChecked WHERE ticket_id = :ticket_id");
            $stmt->bindValue(':ticket_id', $ticket->getTicketId());
            $stmt->bindValue(':order_id', $ticket->getOrderId());
            $stmt->bindValue(':event_type', $ticket->getEventType());
            $stmt->bindValue(':event_id', $ticket->getEventId());
            $stmt->bindValue(':vat_percentage', $ticket->getVatPercentage());
            $stmt->bindValue(':quantity', $ticket->getQuantity());
            $stmt->bindValue(':isChecked', $ticket->getIsChecked());
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
            $stmt = $this->connection->prepare("SELECT `ticket_id` ,`name` , `start_datetime` as `datetime` , `quantity` , `price` , `ischecked` FROM Ticket t 
            JOIN Reservation r1 ON t.event_id = r1.reservation_id AND t.event_type = 'yummy' AND order_id = :order_id
            JOIN Session s ON r1.session_id = s.session_id 
            JOIN Restaurant r ON s.restaurant_id = r.restaurant_id;");
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
            $stmt = $this->connection->prepare("SELECT `ticket_id`,`name`,`datetime`,`quantity` ,`start_location`, `price`, `ischecked` 
            FROM Ticket
            JOIN Tour ON Ticket.event_id = Tour.tour_id
            JOIN Language ON Tour.tour_id = Language.tour_id
            WHERE Ticket.event_type = 'history' AND Ticket.order_id = :order_id
            GROUP BY Ticket.ticket_id;");

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
            $stmt = $this->connection->prepare("SELECT `reservation_id` , `name`, `start_datetime`,`price` FROM Reservation r JOIN Session s ON r.session_id = s.session_id JOIN Restaurant re ON s.restaurant_id = re.restaurant_id");
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
            $stmt = $this->connection->prepare("SELECT Event_Jazz.event_id as event_id, name, datetime, hall FROM Event_Jazz JOIN Artist ON Artist.artist_id = Event_Jazz.artist_id;");
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
            $stmt = $this->connection->prepare("SELECT t.tour_id as tour_id, `name`, `datetime`, `start_location`, `price`FROM Tour t JOIN Language l ON t.tour_id= l.tour_id;");
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }

    public function getPriceAndQuantityOnHistoryEvent($event_id){
        try {
            $stmt = $this->connection->prepare("SELECT `available_spaces` AS 'seats_left', `price` FROM Tour t JOIN Language l ON t.tour_id = l.tour_id WHERE t.tour_id = :event_id;");
            $stmt->bindValue(':event_id', $event_id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }

    public function getPriceAndQuantityOnJazzEvent($event_id){
        try {
            $stmt = $this->connection->prepare("SELECT `seats_left` , `price` FROM `Event_Jazz` JOIN Artist ON Artist.artist_id = Event_Jazz.artist_id WHERE Event_Jazz.event_id = :event_id;");
            $stmt->bindValue(':event_id', $event_id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }

    public function getPriceAndQuantityOnYummyEvent($reservation_id){
        try {
            $stmt = $this->connection->prepare("SELECT r.reservation_fee as price, s.seats_left FROM Reservation r JOIN Session s ON r.session_id = s.session_id JOIN Restaurant re ON s.restaurant_id = re.restaurant_id WHERE r.reservation_id = :reservation_id;");
            $stmt->bindValue(':reservation_id', $reservation_id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }


    public function updateOrderPriceAndVat($order_id, $totalPrice, $totalVat){
        try {
            $stmt = $this->connection->prepare("UPDATE `Order` SET `total_price` = :totalPrice, `total_vat` = :totalVat WHERE `order_id` = :order_id;");
            $stmt->bindValue(':totalPrice', $totalPrice);
            $stmt->bindValue(':totalVat', $totalVat);
            $stmt->bindValue(':order_id', $order_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }

    public function getLatestOrderId()
    {
        try {
            $stmt = $this->connection->prepare("SELECT MAX(order_id) FROM `Order`;");
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e)
        {
            echo $e;
            return false;
        }
    }


}
