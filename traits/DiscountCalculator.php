<?php

    trait DiscountCalculator
    {
        public function calculateDiscount($price)
        {
            return $price * 0.20;
        }
    }

?>