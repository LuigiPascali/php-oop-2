<?php

    class CreditCardExpiredException extends Exception
    {
        public function __construct($message = "Credit card is expired.", $code = 0, Exception $previous = null) {
            parent::__construct($message, $code, $previous);
        }
    }
    
?>