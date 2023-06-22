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

            $mail->addAttachment("../public/pdf/order_".$order->getOrderId().".pdf", 'order.pdf');
            $mail->addAttachment("../public/pdf/tickets_".$order->getOrderId().".pdf", 'tickets.pdf');

            $mail->send();
            //remove pdf files after sending
            unlink("../public/pdf/order_".$order->getOrderId().".pdf");
            unlink("../public/pdf/tickets_".$order->getOrderId().".pdf");

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


}