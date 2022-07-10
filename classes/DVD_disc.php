<?php

require_once "Product.php";

class DVD_disc extends Product
{
    public string $size;


    public function __construct($SKU, $name, $price, $size)
    {
        parent::__construct($SKU, $name, $price);
        $this->size = $size . " MB";
        $this->validateSize();
    }

    protected function validateSize()
    {
        if(!preg_match("/^\d*(\.\d{0,2})?\sMB$/",$this->size))
        {
            $this->errors[] = "Product size is not valid";
        }
    }

}