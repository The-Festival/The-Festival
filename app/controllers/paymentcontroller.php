<?php
include_once(__DIR__ . '/../services/paymentservice.php');
include_once(__DIR__ . '/../services/orderservice.php');
use Mollie\Api\MollieApiClient;
class PaymentController {

    private $paymentService;
    private $orderService;
    private $mollie;
    public function __construct()
    {
        $this->orderService = new OrderService();
        $this->paymentService = new PaymentService();
        $this->mollie = new MollieApiClient();
        $this->mollie->setApiKey("test_K2nq2xy53vmbRhQpqS4fhyVudpNTSs");
    }

    public function index()
    {
        if ($this->checkShoppingCart()) {
            $shoppingCart = $_SESSION['ShoppingCart'];
            $totalPrice = $this->paymentService->calculateTotalPriceOfCart($shoppingCart);
            require __DIR__ . '/../views/payment/payment.php';
        } else {
            header('Location: /home');
        }
    }

    public function action(){
        if(isset($_POST['checkoutOrder'])){
            $totalPrice = $_POST['totalPrice'];
            $totalPriceString = number_format($totalPrice, 2, '.', '');

            //initializing payment system

            $payment = $this->mollie->payments->create(
                [
                    "amount" =>
                        [
                            "currency" => "EUR",
                            "value" => "$totalPriceString"
                        ],
                    "description" => "Order for the Haarlem Festival",
                    "redirectUrl" => "http://localhost/payment/success",
                    "cancelUrl" => "http://localhost/payment/failed",
                    "webhookUrl" => "https://f76f-24-132-83-233.ngrok-free.app/payment/webhook",
                    "metadata" => [
                        'session_id' => session_id(),
                        'name' => htmlspecialchars($_POST['name']),
                        'address' => htmlspecialchars($_POST['address']),
                        'phone' => htmlspecialchars($_POST['phone']),
                        'email' => htmlspecialchars($_POST['email']),
                    ],
                ]
            );
            header("Location: " . $payment->getCheckoutUrl());
        }
    }


    public function sendMail(){
        //test prupase simple get to /payment/sendmail?id=1
        $this->paymentService->sendMail($_GET['id']);
    }

    private function checkShoppingCart(){
        if(isset($_SESSION['ShoppingCart']) && count($_SESSION['ShoppingCart']) > 0){
            return true;
        }else{
            return false;
        }
    }

    public function success(){
        $orderId = $this->orderService->getLatestOrderId()[0];
        $this->addTicketsInShoppingCartToOrder($orderId);
        $this->paymentService->sendMail($orderId);
        $this->clearShoppingCart();
        require __DIR__ . '/../views/payment/success.php';
    }

    public function failed(){
        require __DIR__ . '/../views/payment/failed.php';
    }

    public function webhook(){
        $paymentId = $_POST['id'];

        // Get payment object from Mollie
        $payment = $this->mollie->payments->get($paymentId);

        // Get order ID from meta data
        $metadata = $payment->metadata;
        $name = $metadata->name;
        $address = $metadata->address;
        $phone = $metadata->phone;
        $email = $metadata->email;
        $paymentMethod = $payment->method;

        // Update order status based on payment status
        if ($payment->isPaid()) {
            $this->createAndAddOrder($name,$address, $phone, $email,$paymentMethod);
        } elseif ($payment->isFailed()){
            header("Location: /payment/failed");
        }
        // Send confirmation to Mollie
        http_response_code(200);
    }

    private function createAndAddOrder($name,$address, $phone, $email,$paymentMethod){
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

    private function createAndAddTicketToOrder($order_Id,$event_Id, $event_Type, $quantity, $vat_Percentage){
        $ticket = new Ticket();
        $ticket->setOrderId($order_Id);
        $ticket->setEventId($event_Id);
        $ticket->setEventType($event_Type);
        $ticket->setQuantity($quantity);
        $ticket->setVatPercentage($vat_Percentage);
        $ticket->setIsChecked(0);
        $this->orderService->addTicket($ticket);
    }

    private function addTicketsInShoppingCartToOrder($order_id){
            $shoppingCart = $_SESSION['ShoppingCart'];
            foreach($shoppingCart as $item){
                $vatPercentage = $item['event_type'] == 'yummy' ? 9 : 21;
                $this->createAndAddTicketToOrder($order_id,$item['event_id'],$item['event_type'],$item['quantity'],$vatPercentage);
            }
    }

    private function clearShoppingCart()
    {
        if(isset($_SESSION['ShoppingCart'])){
            unset($_SESSION['ShoppingCart']);
        }
    }

}

