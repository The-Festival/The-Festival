<?php
include_once(__DIR__ . '/../services/paymentservice.php');
include_once(__DIR__ . '/../services/orderservice.php');
use Mollie\Api\MollieApiClient;
class PaymentController {

    private $paymentService;
    private $mollie;

    public function __construct()
    {
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


    private function checkShoppingCart(){
        if(isset($_SESSION['ShoppingCart']) && count($_SESSION['ShoppingCart']) > 0){
            return true;
        }else{
            return false;
        }
    }

    public function success(){
        $orderId = $this->paymentService->getLatestOrderId()[0];
        $this->addTicketsInShoppingCartToOrder($orderId);
        $this->paymentService->sendMail($orderId);
        $this->clearShoppingCart();
        require __DIR__ . '/../views/payment/success.php';
    }

    public function failed(){
        require __DIR__ . '/../views/payment/failed.php';
    }

    public function webhook(){
        $paymentId = htmlspecialchars($_POST['id']);

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
            $this->paymentService->createAndAddOrderForPayment($name,$address, $phone, $email,$paymentMethod);
        } elseif ($payment->isFailed()){
            header("Location: /payment/failed");
        }
        // Send confirmation to Mollie
        http_response_code(200);
    }

    private function addTicketsInShoppingCartToOrder($order_id){
            $shoppingCart = $_SESSION['ShoppingCart'];
            foreach($shoppingCart as $item){
                $vatPercentage = $item['event_type'] == 'yummy' ? 9 : 21;
                $this->paymentService->createAndAddTicketToOrderForPayment($order_id,$item['event_id'],$item['event_type'],$item['quantity'],$vatPercentage);
            }
    }

    private function clearShoppingCart()
    {
        if(isset($_SESSION['ShoppingCart'])){
            unset($_SESSION['ShoppingCart']);
        }
    }

}

