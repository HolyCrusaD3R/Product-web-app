<?php

class Product
{
    public string $SKU;
    public string $name;
    public float $price;

    public function __construct($SKU, $name, $price)
    {
        $this->SKU = $SKU;
        $this->name = $name;
        $this->price = number_format((float) $price, 2, '.', '');
    }
}