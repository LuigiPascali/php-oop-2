<?php

    require_once __DIR__ . '/../traits/DiscountCalculator.php';

    class Customer
    {
        use DiscountCalculator;

        public $name;
        public $address;
        public $loginCredentials;

        public function __construct($name, $address, $loginCredentials)
        {
            $this->name = $name;
            $this->address = $address;
            $this->loginCredentials = $loginCredentials;
        }
    }

?>