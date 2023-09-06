<?php

require_once __DIR__ . '/../exceptions/CreditCardExpiredException.php';

class Order
{
    public $products;
    public $totalPrice;
    public $customerDetails;

    public function __construct($products, $totalPrice, $customerDetails)
    {
        $this->products = $products;
        $this->totalPrice = $totalPrice;
        $this->customerDetails = $customerDetails;
    }

    public function processPayment($creditCard)
    {
        if ($creditCard->isExpired()) {
            throw new CreditCardExpiredException();
        }

        echo "Payment processed successfully!";
    }
}
?>