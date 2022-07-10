<?php

class Product
{
    public string $SKU;
    public string $name;
    public float $price;
    public array $errors;

    public function __construct($SKU, $name, $price)
    {
        $this->SKU = $SKU;
        $this->name = $name;
        $this->price = number_format((float) $price, 2, '.', '');
        $this->validateSKU();
        $this->validateName();
        $this->validatePrice();
    }

    protected function validateSKU()
    {
        if(!preg_match("/^[a-zA-Z01-9_\-!@#$%^&*()=]+$/",$this->SKU))
        {
            $this->errors[] = "SKU is not valid";
        }
    }

    protected function validateName()
    {
        if(!preg_match("/^[a-zA-Z01-9_\-][a-zA-Z01-9_\-\s]*$/",$this->name))
        {
            $this->errors[] = "Product name is not valid";
        }
    }

    protected function validatePrice()
    {
        if(!preg_match("/^\d*(\.\d{0,2})?$/",$this->price))
        {
            $this->errors[] = "Product price is not valid";
        }
    }

}