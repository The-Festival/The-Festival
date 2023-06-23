<?php
include_once(__DIR__ . '/../services/orderservice.php');
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class PaymentService {

    private $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService();
    }

    public function sendMail($orderId){
        $order = $this->orderService->getOrderById($orderId);

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'festivalcrisis@gmail.com';
            $mail->Password   = 'vfsidcwlbhtqolop';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom('festivalcrisis@gmail.com', 'The Festival organization');
            $mail->addAddress($order->getEmailaddress());
            //Content
            $mail->isHTML(true);
            $mail->Subject = 'The Festival Order';
            $mail->Body    = 'Hey ' . $order->getClientName() . ',<br><br>Thank you for your order!<br>'. 'The order and tickets are attached to this email.<br><br>Kind regards,<br>The Festival organization';
            $mail->AltBody = 'Hey ' . $order->getClientName() . ',\n\nThank you for your order!\nThe order and tickets are attached to this email.\n\nKind regards,\nThe Festival organization';
            $this->orderService->orderPdfForPayment($order->getOrderId());
            $this->orderService->ticketsPdfOnOrder($order->getOrderId());

            $mail->addAttachment("../public/order_".$order->getOrderId().".pdf", 'order.pdf');
            $mail->addAttachment("../public/tickets_".$order->getOrderId().".pdf", 'tickets.pdf');

            $mail->send();
            //remove pdf files after sending
            unlink("../public/order_".$order->getOrderId().".pdf");
            unlink("../public/tickets_".$order->getOrderId().".pdf");

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


    }

    public function calculateTotalPriceOfCart(mixed $shoppingCart)
    {
        $totalPrice = 0;
        foreach ($shoppingCart as $item) {
            $totalPrice += $item['product_price'] * $item['quantity'];
        }
        return $totalPrice;
    }

    public function createAndAddTicketToOrderForPayment($order_Id, $event_Id, $event_Type, $quantity, $vat_Percentage){
        $ticket = new Ticket();
        $ticket->setOrderId($order_Id);
        $ticket->setEventId($event_Id);
        $ticket->setEventType($event_Type);
        $ticket->setQuantity($quantity);
        $ticket->setVatPercentage($vat_Percentage);
        $ticket->setIsChecked(0);
        $this->orderService->addTicket($ticket);
    }

    public function createAndAddOrderForPayment($name, $address, $phone, $email, $paymentMethod){
        $order = new Order();
        $order->setClientName($name);
        $order->setAddress($address);
        $order->setPhonenumber($phone);
        $order->setEmailaddress($email);
        $order->setOrderTime(date("Y-m-d H:i:s"));
        $order->setPaymentMethod($paymentMethod);
        $order->setTotalPrice(0);
        $order->setTotalVat(0);
        $this->orderService->addOrder($order);
        return $this->orderService->getLatestOrderId();
    }

    public function getLatestOrderId()
    {
        return $this->orderService->getLatestOrderId();
    }

    public function checkQuantity($event_id,$event_type,$quantity)
    {
        $ticket = new Ticket();
        $ticket->setEventId($event_id);
        $ticket->setEventType($event_type);
        $ticket->setQuantity($quantity);
        return $this->orderService->checkTicketQuantity($ticket);
    }

}