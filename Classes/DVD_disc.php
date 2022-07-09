<?php

require_once "Product.php";

class DVD_disc extends Product
{
    public string $size;

    public function __construct($SKU, $name, $price, $size)
    {
        parent::__construct($SKU, $name, $price);
        $this->size = $size . " MB";
    }
}