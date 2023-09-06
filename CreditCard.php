<?php 

    class CreditCard {
        private $cardNumber;
        private $expirationDate;
        
        public function __construct($cardNumber, $expirationDate) {
            $this->cardNumber = $cardNumber;
            $this->expirationDate = $expirationDate;
        }
        
        public function validateCard() {
            $cardNumber = str_replace(' ', '', $this->cardNumber);
            
            if (!ctype_digit($cardNumber)) {
                return false;
            }
            
            if (strlen($cardNumber) !== 16) {
                return false;
            }
            
            if (!preg_match('/^(0[1-9]|1[0-2])\/[0-9]{2}$/', $this->expirationDate)) {
                return false;
            }
            
            $currentDate = date('m/y');
            if (strtotime($this->expirationDate) < strtotime($currentDate)) {
                return false;
            }
            
            return true;
        }
        
        public function isExpired() {
            $currentDate = date('m/y');
            $expirationDate = $this->expirationDate;
            
            if (strtotime($expirationDate) < strtotime($currentDate)) {
                return true;
            }
            
            return false;
        }
        
    }

?>