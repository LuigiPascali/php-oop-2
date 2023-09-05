<?php

    class Product
    {
        public $id;
        public $name;
        public $description;
        public $price;
        public $category;
        public $photo;

        public function __construct($id, $name, $description, $price, $category, $photo)
        { 
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->price = $price;
            $this->category = $category;
            $this->photo = $photo;
        }
    }

?>