<?php

    require_once __DIR__ . '/Product.php';

    require_once __DIR__ . '/Category.php';

    class Shop
    {
        public $categories;

        public function __construct()
        { 
            $this->categories = array();
        }

        public function addCategory($category)
        { 
            $this->categories[] = $category;
        }
    }

?>