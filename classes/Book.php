<?php

require_once "Product.php";

class Book extends Product
{
    public string $size;

    public function __construct($SKU, $name, $price, $size)
    {
        parent::__construct($SKU, $name, $price);
        $this->size = $size . " KG";
    }

    protected function validateSize()
    {
        if(!preg_match("/^\d*(\.\d{0,2})?\sKG$/",$this->size))
        {
            $this->errors[] = "Product size is not valid";
        }
    }
}