<?php
// charge.php

require 'vendor/autoload.php'; // Include Razorpay SDK

use Razorpay\Api\Api;

$api_key = 'rzp_test_G3iTmiU8PjLHIf';
$api_secret = 'eTWQidpzmmmRKqxpWJMdqIrI';

$api = new Api($api_key, $api_secret);

$amount = $_POST['amount']; // Amount in paise
$order_currency = 'INR';

$order = $api->order->create(array(
    'receipt' => '123',
    'amount' => $amount, // Amount in paise
    'currency' => $order_currency
));

$order_id = $order['id'];

$data = [
    "key" => $api_key,
    "amount" => $amount,
    "currency" => $order_currency,
    "name" => "Your Company Name",
    "description" => "Payment for your order",
    "image" => "https://cdn.pixabay.com/photo/2016/05/05/02/37/sunset-1373171_1280.jpg",
    "order_id" => $order_id,
    "callback_url" => "http://localhost/Razorpay-GPT/paymentcallback.php",
    "prefill" => [
        "name" => "Customer Name",
        "email" => "customer@example.com",
        "contact" => "9999999999"
    ],
    "notes" => [
        "address" => "Customer Address"
    ],
    "theme" => [
        "color" => "#F37254"
    ]
];

$json = json_encode($data);
?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form action="charge.php" method="POST">
    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php echo $api_key ?>"
        data-amount="<?php echo $amount ?>"
        data-currency="<?php echo $order_currency ?>"
        data-order_id="<?php echo $order_id ?>"
        data-buttontext="Pay with Razorpay"
        data-name="Your Company Name"
        data-description="Payment for your order"
        data-image="https://cdn.pixabay.com/photo/2016/05/05/02/37/sunset-1373171_1280.jpg"
        data-prefill.name="Customer Name"
        data-prefill.email="customer@example.com"
        data-prefill.contact="9999999999"
        data-theme.color="#F37254"
    ></script>
    <input type="hidden" custom="Hidden Element" name="hidden">
</form>
