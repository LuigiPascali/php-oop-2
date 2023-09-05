<?php

class Category
{
    public $name;
    public $products;

    public function __construct($name)
    {
        $this->name = $name;

        $this->products = array();
    }

    public function addProduct($product)
    {  
        $this->products[] = $product;
    }
}

?>