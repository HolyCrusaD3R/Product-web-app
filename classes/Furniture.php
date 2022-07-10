<?php

require_once "Product.php";

class Furniture extends Product
{
    public string $size;

    public function __construct($SKU, $name, $price, $size)
    {
        parent::__construct($SKU, $name, $price);
        $this->size = $size[0] . 'x' . $size[1] . 'x' . $size[2];
    }

    protected function validateSize()
    {
        if(!preg_match("/^\d+(\.\d{0,2})?x\d+(\.\d{0,2})?x\d+(\.\d{0,2})?$/",$this->size))
        {
            $this->errors[] = "Product size is not valid";
        }
    }
}